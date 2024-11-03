<x-app-layout>
    <div class="py-6 px-4 md:px-12">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Manage Prices</h2>

        <!-- Search Box -->
        <form method="GET" action="{{ route('admin.prices.prices') }}" class="mb-6">
            <label for="search" class="block text-sm font-medium text-gray-700">Search by Decant Name</label>
            <div class="flex mt-1">
                <input type="text" name="search" id="search" placeholder="Enter decant name..."
                    value="{{ request('search') }}" class="border border-gray-300 rounded-md p-2 w-full">
                <button type="submit" class="ml-2 bg-blue-500 text-white rounded-md px-4 py-2">Search</button>
            </div>
        </form>

        <!-- Price Listing -->
        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-4">All Prices</h3>
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2">Decant Name</th>
                        <th class="py-2">Size</th>
                        <th class="py-2">Price</th>
                        <th class="py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prices as $price)
                        <tr class="text-center">
                            <td class="py-2 border-b border-gray-200">{{ $price->decant->name }}</td>
                            <td class="py-2 border-b border-gray-200">{{ $price->size->size }}</td>
                            <td class="py-2 border-b border-gray-200">{{ $price->price }} Kyat</td>
                            <td class="py-2 border-b border-gray-200">
                                <a href="{{ route('admin.prices.edit', $price->id) }}" class="text-blue-500">Edit</a>
                                <form action="{{ route('admin.prices.delete', $price->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $prices->links('pagination::custom') }}
            <!-- Using the same pagination layout as the decants -->
        </div>

        <!-- Add New Price Form -->
        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-4">Add New Price</h3>
            <form action="{{ route('admin.prices.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Decant Dropdown -->
                    <div>
                        <label for="decant_id" class="block text-sm font-medium">Select Decant</label>
                        <select name="decant_id" class="border border-gray-300 rounded-md p-2 w-full">
                            @foreach ($decants as $decant)
                                <option value="{{ $decant->id }}">{{ $decant->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Size Dropdown -->
                    <div>
                        <label for="size_id" class="block text-sm font-medium">Select Size</label>
                        <select name="size_id" class="border border-gray-300 rounded-md p-2 w-full">
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->size }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Price Input -->
                    <div>
                        <label for="price" class="block text-sm font-medium">Price</label>
                        <input type="text" name="price" required
                            class="border border-gray-300 rounded-md p-2 w-full">
                    </div>
                </div>
                @if ($errors->has('error'))
                    <div class="text-red-500 mb-4">
                        {{ $errors->first('error') }}
                    </div>
                @endif
                <!-- Submit Button -->
                <button type="submit" class="bg-blue-500 text-white rounded-md p-3">Add Price</button>
            </form>
        </div>

        {{-- <!-- Pagination -->
        <div class="mt-6">
            {{ $prices->links() }}
        </div> --}}
    </div>
</x-app-layout>
