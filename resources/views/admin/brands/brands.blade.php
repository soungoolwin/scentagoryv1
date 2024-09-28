<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Brands') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">All Brands</h3>

                    <!-- Brands Table -->
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Brand Name</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr class="text-center">
                                    <td class="py-2 px-4 border-b">{{ $brand->name }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('admin.brands.edit', $brand->id) }}"
                                            class="text-blue-500">Edit</a>
                                        <form action="{{ route('admin.brands.delete', $brand->id) }}" method="POST"
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

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $brands->links('pagination::custom') }}
                        <!-- Using the same pagination layout as the decants -->
                    </div>

                    <!-- Add New Brand Form -->
                    <h3 class="text-lg font-bold mt-8 mb-4">Add New Brand</h3>
                    <form action="{{ route('admin.brands.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name" class="block text-gray-700 font-semibold">Brand Name</label>
                            <input type="text" name="name" required
                                class="border border-gray-300 rounded-md p-2 w-full">
                        </div>
                        <button type="submit" class="bg-blue-500 text-white rounded-md p-2 mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
