<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Decant;
use App\Models\Price;
use App\Models\Size;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    // Fetch all decants and show in table
    public function decants()
    {
        // Fetch paginated decants with the associated brand, 10 per page
        $decants = Decant::with('brand')->paginate(10);
        $brands = Brand::all(); // Fetch all brands for the dropdown

        return view('admin.decants.decants', compact('decants', 'brands'));
    }

    // Store a new decant
    // Store a new decant
    public function storeDecant(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'scent_accords' => 'nullable|string',
            'top_note' => 'nullable|string',
            'base_note' => 'nullable|string',
            'gender' => 'nullable|string|in:Male,Female,Unisex',
            'brand_category' => 'required|string',
            'country' => 'nullable|string',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'required|url'
        ]);

        // Create the decant with the image URL
        Decant::create($validatedData);

        return redirect()->route('admin.decants')->with('success', 'Decant created successfully.');
    }

    // Edit decant form with old data
    public function editDecant($id)
    {
        $decant = Decant::findOrFail($id);
        $brands = Brand::all(); // Fetch all brands for the dropdown
        return view('admin.decants.edit', compact('decant', 'brands'));
    }

    // Update decant
    public function updateDecant(Request $request, $id)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'scent_accords' => 'nullable|string',
            'top_note' => 'nullable|string',
            'base_note' => 'nullable|string',
            'gender' => 'nullable|string|in:Male,Female,Unisex',
            'brand_category' => 'required|string',
            'country' => 'nullable|string',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'required|url' // Ensure this matches the form input name
        ]);

        // Find the decant by ID and update it
        $decant = Decant::findOrFail($id);
        $decant->update($validatedData);

        return redirect()->route('admin.decants')->with('success', 'Decant updated successfully.');
    }



    // Delete decant
    public function deleteDecant($id)
    {
        $decant = Decant::findOrFail($id);
        $decant->delete();
        return redirect()->route('admin.decants')->with('success', 'Decant deleted successfully.');
    }



    // Brands
    public function brands()
    {
        $brands = Brand::paginate(10); // Paginate 10 per page
        return view('admin.brands.brands', compact('brands'));
    }


    public function createBrand(Request $request)
    {
        return view('admin.brands.create'); // Show create form
    }

    public function storeBrand(Request $request)
    {
        // Validate and create a new brand
        $validatedData = $request->validate(['name' => 'required|string|max:255']);
        Brand::create($validatedData);
        return redirect()->route('admin.brands')->with('success', 'Brand created successfully.');
    }

    public function editBrand($id)
    {
        $brand = Brand::findOrFail($id); // Fetch the brand by ID
        return view('admin.brands.edit', compact('brand')); // Pass the brand data to the edit view
    }

    public function updateBrand(Request $request, $id)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Find the brand by ID and update it
        $brand = Brand::findOrFail($id);
        $brand->update($validatedData);

        // Redirect with success message
        return redirect()->route('admin.brands')->with('success', 'Brand updated successfully.');
    }

    public function deleteBrand($id)
    {
        // Delete the brand
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('admin.brands')->with('success', 'Brand deleted successfully.');
    }

    // Sizes
    public function sizes()
    {
        $sizes = Size::all(); // Fetch all sizes
        return view('admin.sizes.sizes', compact('sizes')); // Pass data to the sizes listing view
    }

    // Show form to create a new size
    public function createSize()
    {
        return view('admin.sizes.create'); // Show the create size form
    }

    // Store a newly created size in the database
    public function storeSize(Request $request)
    {
        $validatedData = $request->validate([
            'size' => 'required|string|max:255|unique:sizes,size',
        ]);

        Size::create($validatedData); // Create a new size
        return redirect()->route('admin.sizes')->with('success', 'Size created successfully.');
    }


    // Show form to edit an existing size
    public function editSize($id)
    {
        $size = Size::findOrFail($id); // Find size by ID
        return view('admin.sizes.edit', compact('size')); // Pass data to the edit view
    }

    // Update an existing size
    public function updateSize(Request $request, $id)
    {
        $validatedData = $request->validate([
            'size' => 'required|string|max:255|unique:sizes,size,' . $id,
        ]);

        $size = Size::findOrFail($id); // Find size by ID
        $size->update($validatedData); // Update size
        return redirect()->route('admin.sizes')->with('success', 'Size updated successfully.');
    }


    // Delete a size
    public function deleteSize($id)
    {
        $size = Size::findOrFail($id); // Find size by ID
        $size->delete(); // Delete the size
        return redirect()->route('admin.sizes')->with('success', 'Size deleted successfully.');
    }

    // Prices
    public function prices()
    {
        $prices = Price::with('decant', 'size')->paginate(10);
        $decants = Decant::all();
        $sizes = Size::all(); // Fetch prices with their relationships
        return view('admin.prices.prices', compact('prices', 'decants', 'sizes')); // Pass data to the prices listing view
    }

    // Show form to create a new price
    public function createPrice()
    {
        $decants = Decant::all(); // Fetch all decants
        $sizes = Size::all(); // Fetch all sizes
        return view('admin.prices.create', compact('decants', 'sizes')); // Show the create price form
    }

    // Store a newly created price in the database
    public function storePrice(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'decant_id' => 'required|exists:decants,id',
            'size_id' => 'required|exists:sizes,id',
            'price' => 'required|numeric|min:0',
        ]);

        // Check if the price for this decant and size already exists
        $existingPrice = Price::where('decant_id', $request->decant_id)
            ->where('size_id', $request->size_id)
            ->first();

        if ($existingPrice) {
            // Redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'Price for this decant and size combination already exists.']);
        }

        // Create a new price
        Price::create($validatedData);

        return redirect()->route('admin.prices')->with('success', 'Price created successfully.');
    }

    // Show form to edit an existing price
    public function editPrice($id)
    {
        $price = Price::findOrFail($id); // Find price by ID
        $decants = Decant::all(); // Fetch all decants
        $sizes = Size::all(); // Fetch all sizes
        return view('admin.prices.edit', compact('price', 'decants', 'sizes')); // Pass data to the edit view
    }

    // Update an existing price
    public function updatePrice(Request $request, $id)
    {
        $validatedData = $request->validate([
            'decant_id' => 'required|exists:decants,id',
            'size_id' => 'required|exists:sizes,id',
            'price' => 'required|numeric|min:0',
        ]);

        $price = Price::findOrFail($id); // Find price by ID
        $price->update($validatedData); // Update price
        return redirect()->route('admin.prices')->with('success', 'Price updated successfully.');
    }

    // Delete a price
    public function deletePrice($id)
    {
        $price = Price::findOrFail($id); // Find price by ID
        $price->delete(); // Delete the price
        return redirect()->route('admin.prices')->with('success', 'Price deleted successfully.');
    }
}
