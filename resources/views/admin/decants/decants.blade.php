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
                    <a href="{{ route('admin.decants.create') }}" class="btn btn-primary">Create Decant</a>
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Size</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($decants as $decant)
                                <tr>
                                    <td>{{ $decant->name }}</td>
                                    <td>{{ $decant->size->name }}</td>
                                    <td>{{ $decant->brand->name }}</td>
                                    <td>{{ $decant->price }}</td>
                                    <td>
                                        <a href="{{ route('admin.decants.edit', $decant->id) }}"
                                            class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('admin.decants.destroy', $decant->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
