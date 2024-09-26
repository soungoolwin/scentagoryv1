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
        $decants = $query->paginate(10); // Adjust pagination as needed

        return view('decants', compact('decants', 'brands'));
    }
}
