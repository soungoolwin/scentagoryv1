<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sizes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Display success message -->
                    @if (session('success'))
                        <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Display validation errors -->
                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h3 class="text-xl font-semibold mb-4">All Sizes</h3>
                    <table class="min-w-full bg-white border border-gray-200 mb-6">
                        <thead>
                            <tr>
                                <th class="py-2">Size</th>
                                <th class="py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sizes as $size)
                                <tr class="text-center">
                                    <td class="py-2 border-b border-gray-200">{{ $size->size }}</td>
                                    <td class="py-2 border-b border-gray-200">
                                        <a href="{{ route('admin.sizes.edit', $size->id) }}"
                                            class="text-blue-500">Edit</a>
                                        <form action="{{ route('admin.sizes.delete', $size->id) }}" method="POST"
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

                    <h3 class="text-xl font-semibold mb-4">Add New Size</h3>

                    <form action="{{ route('admin.sizes.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Size Input -->
                            <div>
                                <label for="size" class="block text-sm font-medium">Size</label>
                                <input type="text" name="size" value="{{ old('size') }}" required
                                    class="border border-gray-300 rounded-md p-2 w-full">
                            </div>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white rounded-md p-3">Add Size</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
