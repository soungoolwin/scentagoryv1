<x-app-layout>
    <div class="py-6 px-4 md:px-12"> <!-- Added horizontal padding here -->
        <h2 class="text-3xl font-semibold mb-6 text-gray-800">Edit Decant</h2>
        <form action="{{ route('admin.decants.update', $decant->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Grid Layout for Form Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Decant Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700">Decant Name</label>
                    <input type="text" name="name" value="{{ $decant->name }}" required
                        class="border border-gray-300 rounded-md p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Brand -->
                <div>
                    <label for="brand_id" class="block text-sm font-semibold text-gray-700">Brand</label>
                    <select name="brand_id" required
                        class="border border-gray-300 rounded-md p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $brand->id == $decant->brand_id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Brand Category -->
                <div>
                    <label for="brand_category" class="block text-sm font-semibold text-gray-700">Brand Category</label>
                    <input type="text" name="brand_category" value="{{ $decant->brand_category }}"
                        class="border border-gray-300 rounded-md p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Image URL -->
                <div>
                    <label for="image" class="block text-sm font-semibold text-gray-700">Image URL</label>
                    <input type="text" name="image" value="{{ $decant->image }}" required
                        class="border border-gray-300 rounded-md p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-semibold text-gray-700">Description</label>
                    <textarea name="description"
                        class="border border-gray-300 rounded-md p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        rows="4">{{ $decant->description }}</textarea>
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-sm font-semibold text-gray-700">Gender</label>
                    <select name="gender"
                        class="border border-gray-300 rounded-md p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="Male" {{ $decant->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $decant->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Unisex" {{ $decant->gender == 'Unisex' ? 'selected' : '' }}>Unisex</option>
                    </select>
                </div>

                <!-- Scent Accords -->
                <div>
                    <label for="scent_accords" class="block text-sm font-semibold text-gray-700">Scent Accords</label>
                    <textarea name="scent_accords"
                        class="border border-gray-300 rounded-md p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        rows="2">{{ $decant->scent_accords }}</textarea>
                </div>

                <!-- Top Note -->
                <div>
                    <label for="top_note" class="block text-sm font-semibold text-gray-700">Top Note</label>
                    <textarea name="top_note"
                        class="border border-gray-300 rounded-md p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        rows="2">{{ $decant->top_note }}</textarea>
                </div>

                <!-- Base Note -->
                <div>
                    <label for="base_note" class="block text-sm font-semibold text-gray-700">Base Note</label>
                    <textarea name="base_note"
                        class="border border-gray-300 rounded-md p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        rows="2">{{ $decant->base_note }}</textarea>
                </div>

                <!-- Country -->
                <div>
                    <label for="country" class="block text-sm font-semibold text-gray-700">Country</label>
                    <input type="text" name="country" value="{{ $decant->country }}"
                        class="border border-gray-300 rounded-md p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="bg-blue-500 text-white font-semibold rounded-md p-3 w-full md:w-auto mt-6 hover:bg-blue-600">
                Update Decant
            </button>
        </form>
    </div>
</x-app-layout>
