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
                    <h3>All Brands</h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2">Brand Name</th>
                                <th class="py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr class="text-center">
                                    <td class="py-2 border-b border-gray-200">{{ $brand->name }}</td>
                                    <td class="py-2 border-b border-gray-200">
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

                    <h3>Add New Brand</h3>
                    <form action="{{ route('admin.brands.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="name">Brand Name</label>
                            <input type="text" name="name" required class="border border-gray-300 rounded-md p-2">
                        </div>
                        <button type="submit" class="bg-blue-500 text-white rounded-md p-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
