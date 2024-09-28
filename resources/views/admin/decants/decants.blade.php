<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Decants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>All Decants</h3>
                    <div class="mt-4 border border-gray-300 p-4">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="py-2">Name</th>
                                    <th class="py-2">Brand</th>
                                    <th class="py-2">Brand Category</th>
                                    <th class="py-2">Gender</th>
                                    <th class="py-2">Country</th>
                                    <th class="py-2">Description</th>
                                    <th class="py-2">Scent Accords</th>
                                    <th class="py-2">Top Note</th>
                                    <th class="py-2">Base Note</th>
                                    <th class="py-2">Image URL</th>
                                    <th class="py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($decants as $decant)
                                    <tr class="text-center">
                                        <td class="py-2 border-b border-gray-200">{{ $decant->name }}</td>
                                        <td class="py-2 border-b border-gray-200">{{ $decant->brand->name }}</td>
                                        <td class="py-2 border-b border-gray-200">{{ $decant->brand_category }}</td>
                                        <td class="py-2 border-b border-gray-200">{{ $decant->gender }}</td>
                                        <td class="py-2 border-b border-gray-200">{{ $decant->country }}</td>
                                        <td class="py-2 border-b border-gray-200">{{ $decant->description }}</td>
                                        <td class="py-2 border-b border-gray-200">{{ $decant->scent_accords }}</td>
                                        <td class="py-2 border-b border-gray-200">{{ $decant->top_note }}</td>
                                        <td class="py-2 border-b border-gray-200">{{ $decant->base_note }}</td>
                                        <td class="py-2 border-b border-gray-200">
                                            <a href="{{ $decant->image }}" target="_blank" class="text-blue-500">View
                                                Image</a>
                                        </td>
                                        <td class="py-2 border-b border-gray-200">
                                            <a href="{{ route('admin.decants.edit', $decant->id) }}"
                                                class="text-blue-500">Edit</a>
                                            <form action="{{ route('admin.decants.delete', $decant->id) }}"
                                                method="POST" style="display:inline;">
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

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $decants->links('pagination::custom') }}
                    </div>


                    <h3 class="mt-8">Add New Decant</h3>
                    <div class="overflow-y-auto max-h-80 mt-4 border border-gray-300 p-4">
                        <form action="{{ route('admin.decants.store') }}" method="POST" class="flex space-x-4">
                            @csrf

                            <!-- Form Fields Container -->
                            <div class="flex space-x-4">

                                <div class="min-w-[150px]">
                                    <label for="name" class="block text-sm font-medium">Decant Name</label>
                                    <input type="text" name="name" required
                                        class="border border-gray-300 rounded-md p-2 w-full">
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="description" class="block text-sm font-medium">Description</label>
                                    <textarea name="description" class="border border-gray-300 rounded-md p-2 w-full" rows="1"></textarea>
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="scent_accords" class="block text-sm font-medium">Scent Accords</label>
                                    <textarea name="scent_accords" class="border border-gray-300 rounded-md p-2 w-full" rows="1"></textarea>
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="top_note" class="block text-sm font-medium">Top Note</label>
                                    <textarea name="top_note" class="border border-gray-300 rounded-md p-2 w-full" rows="1"></textarea>
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="base_note" class="block text-sm font-medium">Base Note</label>
                                    <textarea name="base_note" class="border border-gray-300 rounded-md p-2 w-full" rows="1"></textarea>
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="gender" class="block text-sm font-medium">Gender</label>
                                    <select name="gender" class="border border-gray-300 rounded-md p-2 w-full">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Unisex">Unisex</option>
                                    </select>
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="brand_category" class="block text-sm font-medium">Brand Category</label>
                                    <input type="text" name="brand_category" required
                                        class="border border-gray-300 rounded-md p-2 w-full">
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="country" class="block text-sm font-medium">Country</label>
                                    <input type="text" name="country"
                                        class="border border-gray-300 rounded-md p-2 w-full">
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="brand_id" class="block text-sm font-medium">Brand</label>
                                    <select name="brand_id" class="border border-gray-300 rounded-md p-2 w-full">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="image" class="block text-sm font-medium">Image URL</label>
                                    <input type="text" name="image"
                                        class="border border-gray-300 rounded-md p-2 w-full">
                                </div>

                                <button type="submit"
                                    class="bg-blue-500 text-white rounded-md p-2 mt-4">Submit</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
