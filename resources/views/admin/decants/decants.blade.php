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

                    {{-- prettier, scroll-friendly table card -------------------------------- --}}
                    <div class="mt-10">
                        <div class="bg-white shadow-md rounded-lg">
                            <div class="px-6 py-4 border-b">
                                <h3 class="text-lg font-semibold text-gray-800">Decant List</h3>
                            </div>

                            {{-- enable horizontal scroll on small screens --}}
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 text-sm">
                                    {{-- ───────────── header ───────────── --}}
                                    <thead class="bg-gray-50 sticky top-0 z-10">
                                        <tr>
                                            @php
                                                $headers = [
                                                    'Name',
                                                    'Brand',
                                                    'Category',
                                                    'Gender',
                                                    'Country',
                                                    'Description',
                                                    'Accords',
                                                    'Top',
                                                    'Base',
                                                    'Image',
                                                    'Actions',
                                                ];
                                            @endphp
                                            @foreach ($headers as $head)
                                                <th
                                                    class="px-4 py-3 text-left font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">
                                                    {{ $head }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>

                                    {{-- ───────────── body ───────────── --}}
                                    <tbody class="divide-y divide-gray-100">
                                        @foreach ($decants as $decant)
                                            <tr class="hover:bg-gray-50">
                                                {{-- Name --}}
                                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $decant->name }}
                                                </td>

                                                {{-- Brand --}}
                                                <td class="px-4 py-2 whitespace-nowrap">
                                                    {{ $decant->brand->name }}
                                                </td>

                                                {{-- Category --}}
                                                <td class="px-4 py-2 whitespace-nowrap">
                                                    {{ $decant->brand_category }}
                                                </td>

                                                {{-- Gender --}}
                                                <td class="px-4 py-2 whitespace-nowrap">
                                                    {{ $decant->gender }}
                                                </td>

                                                {{-- Country --}}
                                                <td class="px-4 py-2 whitespace-nowrap">
                                                    {{ $decant->country }}
                                                </td>

                                                {{-- Description (truncate) --}}
                                                <td class="px-4 py-2 max-w-xs">
                                                    <span class="block truncate" title="{{ $decant->description }}">
                                                        {{ $decant->description }}
                                                    </span>
                                                </td>

                                                {{-- Accords (truncate) --}}
                                                <td class="px-4 py-2 max-w-xs">
                                                    <span class="block truncate" title="{{ $decant->scent_accords }}">
                                                        {{ $decant->scent_accords }}
                                                    </span>
                                                </td>

                                                {{-- Top --}}
                                                <td class="px-4 py-2 max-w-[10rem]">
                                                    <span class="block truncate" title="{{ $decant->top_note }}">
                                                        {{ $decant->top_note }}
                                                    </span>
                                                </td>

                                                {{-- Base --}}
                                                <td class="px-4 py-2 max-w-[10rem]">
                                                    <span class="block truncate" title="{{ $decant->base_note }}">
                                                        {{ $decant->base_note }}
                                                    </span>
                                                </td>

                                                {{-- Image thumbnail --}}
                                                <td class="px-4 py-2">
                                                    <img src="{{ asset('storage/' . $decant->image) }}"
                                                        alt="{{ $decant->name }}"
                                                        class="w-16 h-16 object-cover rounded shadow">
                                                </td>

                                                {{-- Actions --}}
                                                <td class="px-4 py-2 whitespace-nowrap">
                                                    <div class="flex space-x-3">
                                                        <a href="{{ route('admin.decants.edit', $decant->id) }}"
                                                            class="px-3 py-1 bg-blue-600 text-white rounded-md text-xs hover:bg-blue-700">
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('admin.decants.delete', $decant->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Delete this decant?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="px-3 py-1 bg-red-600 text-white rounded-md text-xs hover:bg-red-700">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $decants->links('pagination::custom') }}
                    </div>

                    {{-- prettier, responsive “Add New Decant” card --------------------------- --}}
                    <div class="mt-10 max-h-[38rem] overflow-y-auto">
                        <div class="bg-white shadow-md rounded-lg p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-6">Add New Decant</h3>

                            <form action="{{ route('admin.decants.store') }}" method="POST"
                                enctype="multipart/form-data"
                                class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                                @csrf

                                {{-- Decant name --}}
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Decant Name</label>
                                    <input type="text" name="name" required
                                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                    @error('name')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Description --}}
                                <div class="md:col-span-2 xl:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                    <textarea name="description" rows="2"
                                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                    @error('description')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Scent accords --}}
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Scent Accords</label>
                                    <textarea name="scent_accords" rows="2"
                                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                    @error('scent_accords')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Top note --}}
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Top Note</label>
                                    <textarea name="top_note" rows="2"
                                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                    @error('top_note')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Base note --}}
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Base Note</label>
                                    <textarea name="base_note" rows="2"
                                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                    @error('base_note')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Gender --}}
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                                    <select name="gender"
                                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Unisex">Unisex</option>
                                    </select>
                                    @error('gender')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Brand category --}}
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Brand Category</label>
                                    <input type="text" name="brand_category" required
                                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                    @error('brand_category')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Country --}}
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                                    <input type="text" name="country"
                                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                    @error('country')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Brand dropdown --}}
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                                    <select name="brand_id"
                                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Image --}}
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Image (jpg/png/webp ≤ 2 MB)
                                    </label>
                                    <input type="file" name="image" accept="image/*" required
                                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                    @error('image')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Submit (full-width on xs, right-aligned on lg) --}}
                                <div class="md:col-span-2 xl:col-span-3 flex justify-end">
                                    <button type="submit"
                                        class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        Create Decant
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
