<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Decant;
use Illuminate\Http\Request;

class DecantController extends Controller
{
    public function index(Request $request)
    {
        // Get all brands for the filter
        $brands = Brand::all();

        // Initialize the query for decants
        $query = Decant::query();

        // Check for brand search
        if ($request->has('brandSearch') && $request->brandSearch != '') {
            $brandName = $request->brandSearch;
            $query->whereHas('brand', function ($q) use ($brandName) {
                $q->where('name', 'LIKE', '%' . $brandName . '%');
            });
        }

        // Check for normal search
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where('name', 'LIKE', '%' . $searchTerm . '%');
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
        $decant = Decant::with('prices.size')->findOrFail($id);

        // Calculate price range
        $prices = $decant->prices->pluck('price')->toArray();
        $minPrice = min($prices);
        $maxPrice = max($prices);
        $priceRange = "{$minPrice} - {$maxPrice} MMK";

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
