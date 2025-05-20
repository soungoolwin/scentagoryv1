<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Decant;
use Illuminate\Http\Request;

class DecantController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::all();            // for sidebar
        $query  = Decant::query();         // base query

        /* ─── brand filter ─────────────────────────────────────────── */
        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }

        /* ─── search filter (name or brand name) ───────────────────── */
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhereHas('brand', fn($b) => $b->where('name', 'like', "%{$search}%"));
            });
        }

        /* ─── get results, with prices for range display ───────────── */
        $decants = $query->with('prices')->paginate(9)->withQueryString();

        foreach ($decants as $d) {
            $d->priceRange = $this->getPriceRange($d);
        }

        return view('decant.index', compact('decants', 'brands'));
    }


    public function show(Request $request, $id)
    {
        // Fetch the decant along with its related prices and sizes
        $decant = Decant::with('prices.size')->findOrFail($id);

        // Check if there are prices for this decant
        if ($decant->prices->isNotEmpty()) {
            // Calculate price range if prices are available
            $prices = $decant->prices->pluck('price')->toArray();
            $minPrice = min($prices);
            $maxPrice = max($prices);
            $priceRange = "{$minPrice} - {$maxPrice} MMK";
        } else {
            // If no prices are available, show a default message
            $priceRange = "No prices available";
        }

        // Get the selected size from the request, default to the first size if none is selected
        $selectedPrice = $decant->prices->first();
        if ($request->has('size_id')) {
            $selectedPrice = $decant->prices->where('size_id', $request->size_id)->first() ?? $selectedPrice;
        }

        return view('decant.show', compact('decant', 'priceRange', 'selectedPrice'));
    }



    private function getPriceRange($decant)
    {
        if ($decant->prices->isEmpty()) {
            return 'No prices available';
        }

        $prices = $decant->prices->pluck('price')->toArray();
        $minPrice = min($prices);
        $maxPrice = max($prices);

        return "{$minPrice} - {$maxPrice} MMK";
    }
}
