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
                    <form method="GET" action="{{ route('admin.decants.decants') }}" class="mb-6">
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

                    <!-- Form for adding a new decant omitted for brevity -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
