<x-app-layout>
    <div class="py-6 px-4 md:px-12">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Price</h2>

        <form action="{{ route('admin.prices.update', $price->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Decant Dropdown -->
                <div>
                    <label for="decant_id" class="block text-sm font-medium">Select Decant</label>
                    <select name="decant_id" class="border border-gray-300 rounded-md p-2 w-full">
                        @foreach ($decants as $decant)
                            <option value="{{ $decant->id }}"
                                {{ $decant->id == $price->decant_id ? 'selected' : '' }}>
                                {{ $decant->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Size Dropdown -->
                <div>
                    <label for="size_id" class="block text-sm font-medium">Select Size</label>
                    <select name="size_id" class="border border-gray-300 rounded-md p-2 w-full">
                        @foreach ($sizes as $size)
                            <option value="{{ $size->id }}" {{ $size->id == $price->size_id ? 'selected' : '' }}>
                                {{ $size->size }} <!-- Updated this line to reference the correct column -->
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Price Input -->
                <div>
                    <label for="price" class="block text-sm font-medium">Price</label>
                    <input type="text" name="price" value="{{ $price->price }}" required
                        class="border border-gray-300 rounded-md p-2 w-full">
                </div>
            </div>

            <button type="submit" class="bg-blue-500 text-white rounded-md p-3">Update Price</button>
        </form>
    </div>
</x-app-layout>
