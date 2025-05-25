<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Decant;
use App\Models\Price;
use App\Models\Size;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    // Fetch all decants and show in table
    public function decants(Request $request)
    {
        // Initialize the query with relationships
        $query = Decant::with('brand');

        // Apply search filter if there is a search term
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Fetch paginated decants, applying search if specified
        $decants = $query->paginate(10)->appends(['search' => $request->search]);
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
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:20480',
        ]);


        $validatedData['image'] = $request->file('image')
            ->store('decants', 'public');

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
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,webp|max:2048', // Ensure this matches the form input name
        ]);

        // Find the decant by ID and update it
        $decant = Decant::findOrFail($id);


        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($decant->image);   // remove old
            $validatedData['image'] = $request->file('image')
                ->store('decants', 'public'); // save new
        }
        $decant->update($validatedData);

        return redirect()->route('admin.decants')->with('success', 'Decant updated successfully.');
    }


    public function deleteDecant($id)
    {
        $decant = Decant::findOrFail($id);

        // Remove the image from storage (ignore if file already gone)
        Storage::disk('public')->delete($decant->image);

        // Delete the database row
        $decant->delete();

        return redirect()
            ->route('admin.decants')
            ->with('success', 'Decant deleted successfully.');
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
        return redirect()->route('admin.brands.brands')->with('success', 'Brand created successfully.');
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
        return redirect()->route('admin.brands.brands')->with('success', 'Brand updated successfully.');
    }

    public function deleteBrand($id)
    {
        // Delete the brand
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('admin.brands.brands')->with('success', 'Brand deleted successfully.');
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
        return redirect()->route('admin.sizes.sizes')->with('success', 'Size created successfully.');
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
        return redirect()->route('admin.sizes.sizes')->with('success', 'Size updated successfully.');
    }


    // Delete a size
    public function deleteSize($id)
    {
        $size = Size::findOrFail($id); // Find size by ID
        $size->delete(); // Delete the size
        return redirect()->route('admin.sizes.sizes')->with('success', 'Size deleted successfully.');
    }

    // Prices
    public function prices(Request $request)
    {
        $query = Price::with('decant', 'size');

        if ($request->has('search') && $request->search != '') {
            $query->whereHas('decant', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        $prices = $query->paginate(10)->appends(['search' => $request->search]);
        $decants = Decant::all();
        $sizes = Size::all();

        return view('admin.prices.prices', compact('prices', 'decants', 'sizes'));
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

        return redirect()->route('admin.prices.prices')->with('success', 'Price created successfully.');
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
        return redirect()->route('admin.prices.prices')->with('success', 'Price updated successfully.');
    }

    // Delete a price
    public function deletePrice($id)
    {
        $price = Price::findOrFail($id); // Find price by ID
        $price->delete(); // Delete the price
        return redirect()->route('admin.prices.prices')->with('success', 'Price deleted successfully.');
    }


    public function videos()
    {
        $videos = Video::paginate(10); // Fetch videos with pagination
        return view('admin.videos.videos', compact('videos'));
    }

    // Show form to edit an existing video
    public function editVideo($id)
    {
        $video = Video::findOrFail($id); // Find video by ID
        return view('admin.videos.edit', compact('video')); // Pass data to the edit view
    }
    public function storeVideo(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required',
        ]);

        // Create a new video
        Video::create($validatedData);

        return redirect()->route('admin.videos')->with('success', 'Video added successfully.');
    }


    // Update an existing video
    public function updateVideo(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
        ]);

        $video = Video::findOrFail($id); // Find video by ID
        $video->update($validatedData); // Update video with validated data
        return redirect()->route('admin.videos')->with('success', 'Video updated successfully.');
    }

    // Delete a video
    public function deleteVideo($id)
    {
        $video = Video::findOrFail($id); // Find video by ID
        $video->delete(); // Delete the video
        return redirect()->route('admin.videos')->with('success', 'Video deleted successfully.');
    }
}
