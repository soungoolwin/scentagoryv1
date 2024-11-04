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

                    <!-- Search Form -->
                    <form method="GET" action="{{ route('admin.decants') }}" class="mb-6">
                        <label for="search" class="block text-sm font-medium text-gray-700">Search by Decant
                            Name</label>
                        <div class="flex mt-1">
                            <input type="text" name="search" id="search" placeholder="Enter decant name..."
                                value="{{ request('search') }}" class="border border-gray-300 rounded-md p-2 w-full">
                            <button type="submit"
                                class="ml-2 bg-blue-500 text-white rounded-md px-4 py-2">Search</button>
                        </div>
                    </form>

                    <div class="mt-4 border border-gray-300 p-4">
                        <!-- Wrapper div with overflow-x-auto to enable horizontal scroll -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4">Name</th>
                                        <th class="py-2 px-4">Brand</th>
                                        <th class="py-2 px-4">Brand Category</th>
                                        <th class="py-2 px-4">Gender</th>
                                        <th class="py-2 px-4">Country</th>
                                        <th class="py-2 px-4">Description</th>
                                        <th class="py-2 px-4">Scent Accords</th>
                                        <th class="py-2 px-4">Top Note</th>
                                        <th class="py-2 px-4">Base Note</th>
                                        <th class="py-2 px-4">Image URL</th>
                                        <th class="py-2 px-4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($decants as $decant)
                                        <tr class="text-center">
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $decant->name }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $decant->brand->name }}
                                            </td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $decant->brand_category }}
                                            </td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $decant->gender }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $decant->country }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $decant->description }}
                                            </td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $decant->scent_accords }}
                                            </td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $decant->top_note }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $decant->base_note }}
                                            </td>
                                            <td class="py-2 px-4 border-b border-gray-200">
                                                <a href="{{ $decant->image }}" target="_blank"
                                                    class="text-blue-500">View Image</a>
                                            </td>
                                            <td class="py-2 px-4 border-b border-gray-200">
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
                                    @if ($errors->has('name'))
                                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="description" class="block text-sm font-medium">Description</label>
                                    <textarea name="description" class="border border-gray-300 rounded-md p-2 w-full" rows="1"></textarea>
                                    @if ($errors->has('description'))
                                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('description') }}</p>
                                    @endif
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="scent_accords" class="block text-sm font-medium">Scent Accords</label>
                                    <textarea name="scent_accords" class="border border-gray-300 rounded-md p-2 w-full" rows="1"></textarea>
                                    @if ($errors->has('scent_accords'))
                                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('scent_accords') }}</p>
                                    @endif
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="top_note" class="block text-sm font-medium">Top Note</label>
                                    <textarea name="top_note" class="border border-gray-300 rounded-md p-2 w-full" rows="1"></textarea>
                                    @if ($errors->has('top_note'))
                                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('top_note') }}</p>
                                    @endif
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="base_note" class="block text-sm font-medium">Base Note</label>
                                    <textarea name="base_note" class="border border-gray-300 rounded-md p-2 w-full" rows="1"></textarea>
                                    @if ($errors->has('base_note'))
                                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('base_note') }}</p>
                                    @endif
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="gender" class="block text-sm font-medium">Gender</label>
                                    <select name="gender" class="border border-gray-300 rounded-md p-2 w-full">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Unisex">Unisex</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('gender') }}</p>
                                    @endif
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="brand_category" class="block text-sm font-medium">Brand
                                        Category</label>
                                    <input type="text" name="brand_category" required
                                        class="border border-gray-300 rounded-md p-2 w-full">
                                    @if ($errors->has('brand_category'))
                                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('brand_category') }}
                                        </p>
                                    @endif
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="country" class="block text-sm font-medium">Country</label>
                                    <input type="text" name="country"
                                        class="border border-gray-300 rounded-md p-2 w-full">
                                    @if ($errors->has('country'))
                                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('country') }}</p>
                                    @endif
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="brand_id" class="block text-sm font-medium">Brand</label>
                                    <select name="brand_id" class="border border-gray-300 rounded-md p-2 w-full">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('brand_id'))
                                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('brand_id') }}</p>
                                    @endif
                                </div>

                                <div class="min-w-[150px]">
                                    <label for="image" class="block text-sm font-medium">Image URL</label>
                                    <input type="text" name="image" required
                                        class="border border-gray-300 rounded-md p-2 w-full">
                                    @if ($errors->has('image'))
                                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('image') }}</p>
                                    @endif
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
