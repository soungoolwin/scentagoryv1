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

    public function decants()
    {
        $decants = Decant::all(); // Fetch all decants
        return view('admin.decants.decants', compact('decants'));
    }

    public function createDecant(Request $request)
    {
        return view('admin.decants.create'); // Show create form
    }

    public function storeDecant(Request $request)
    {
        // Validate and create a new decant
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'size_id' => 'required|exists:sizes,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric|min:0',
        ]);

        Decant::create($validatedData);
        return redirect()->route('admin.decants.decants')->with('success', 'Decant created successfully.');
    }

    public function editDecant($id)
    {
        $decant = Decant::findOrFail($id); // Find decant by ID
        return view('admin.decants.edit', compact('decant')); // Show edit form
    }

    public function updateDecant(Request $request, $id)
    {
        // Validate and update the decant
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'size_id' => 'required|exists:sizes,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric|min:0',
        ]);

        $decant = Decant::findOrFail($id);
        $decant->update($validatedData);
        return redirect()->route('admin.decants.decants')->with('success', 'Decant updated successfully.');
    }

    public function destroyDecant($id)
    {
        // Delete the decant
        $decant = Decant::findOrFail($id);
        $decant->delete();
        return redirect()->route('admin.decants.decants')->with('success', 'Decant deleted successfully.');
    }

    // Brands
    public function brands()
    {
        $brands = Brand::all(); // Fetch all brands
        return view('admin.brands.brands', compact('brands')); // Ensure the view path matches your directory structure
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
        $brand = Brand::findOrFail($id); // Find brand by ID
        return view('admin.brands.edit', compact('brand')); // Show edit form
    }

    public function updateBrand(Request $request, $id)
    {
        // Validate and update the brand
        $validatedData = $request->validate(['name' => 'required|string|max:255']);
        $brand = Brand::findOrFail($id);
        $brand->update($validatedData);
        return redirect()->route('admin.brands.brands')->with('success', 'Brand updated successfully.');
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
        return view('admin.sizes.sizes', compact('sizes'));
    }

    public function createSize(Request $request)
    {
        return view('admin.sizes.create'); // Show create form
    }

    public function storeSize(Request $request)
    {
        // Validate and create a new size
        $validatedData = $request->validate(['name' => 'required|string|max:255']);
        Size::create($validatedData);
        return redirect()->route('admin.sizes.sizes')->with('success', 'Size created successfully.');
    }

    public function editSize($id)
    {
        $size = Size::findOrFail($id); // Find size by ID
        return view('admin.sizes.edit', compact('size')); // Show edit form
    }

    public function updateSize(Request $request, $id)
    {
        // Validate and update the size
        $validatedData = $request->validate(['name' => 'required|string|max:255']);
        $size = Size::findOrFail($id);
        $size->update($validatedData);
        return redirect()->route('admin.sizes.sizes')->with('success', 'Size updated successfully.');
    }

    public function destroySize($id)
    {
        // Delete the size
        $size = Size::findOrFail($id);
        $size->delete();
        return redirect()->route('admin.sizes.sizes')->with('success', 'Size deleted successfully.');
    }

    // Prices
    public function prices()
    {
        $prices = Price::all(); // Fetch all prices
        return view('admin.prices.prices', compact('prices'));
    }

    public function createPrice(Request $request)
    {
        return view('admin.prices.create'); // Show create form
    }

    public function storePrice(Request $request)
    {
        // Validate and create a new price
        $validatedData = $request->validate(['amount' => 'required|numeric|min:0']);
        Price::create($validatedData);
        return redirect()->route('admin.prices.prices')->with('success', 'Price created successfully.');
    }

    public function editPrice($id)
    {
        $price = Price::findOrFail($id); // Find price by ID
        return view('admin.prices.edit', compact('price')); // Show edit form
    }

    public function updatePrice(Request $request, $id)
    {
        // Validate and update the price
        $validatedData = $request->validate(['amount' => 'required|numeric|min:0']);
        $price = Price::findOrFail($id);
        $price->update($validatedData);
        return redirect()->route('admin.prices.prices')->with('success', 'Price updated successfully.');
    }

    public function destroyPrice($id)
    {
        // Delete the price
        $price = Price::findOrFail($id);
        $price->delete();
        return redirect()->route('admin.prices')->with('success', 'Price deleted successfully.');
    }
}
