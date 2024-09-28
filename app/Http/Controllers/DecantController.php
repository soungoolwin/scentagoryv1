<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Decant;
use Illuminate\Http\Request;

class DecantController extends Controller
{
    public function index(Request $request)
    {
        // Get all brands for the filter (to display on the side, if still needed)
        $brands = Brand::all();

        // Initialize the query for decants
        $query = Decant::query();

        // Check if there's a search term (can be brand name or decant name)
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;

            // Search for both decant names and brand names
            $query->where('name', 'LIKE', '%' . $searchTerm . '%')
                ->orWhereHas('brand', function ($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', '%' . $searchTerm . '%');
                });
        }

        // Get the paginated results
        $decants = $query->with('prices')->paginate(9); // Load prices for each decant

        // Calculate price range for each decant
        foreach ($decants as $decant) {
            $decant->priceRange = $this->getPriceRange($decant);
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
