<x-app-layout>
    <div class="py-6 px-4 md:px-12"> <!-- Added padding for left and right spacing -->
        <h2 class="text-3xl font-semibold mb-6 text-gray-800">Edit Brand</h2>

        <!-- Form Container -->
        <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Input for Brand Name -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700">Brand Name</label>
                <input type="text" name="name" value="{{ old('name', $brand->name) }}" required
                    class="border border-gray-300 rounded-md p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Update Button -->
            <button type="submit"
                class="bg-blue-500 text-white font-semibold rounded-md p-3 w-full md:w-auto mt-4 hover:bg-blue-600">
                Update Brand
            </button>
        </form>
    </div>
</x-app-layout>
