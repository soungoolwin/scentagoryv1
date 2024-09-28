<x-app-layout>
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.sizes.update', $size->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- For PUT method -->
        <div>
            <label for="size">Size</label>
            <input type="text" name="size" value="{{ old('size', $size->size) }}" required
                class="border border-gray-300 rounded-md p-2">
        </div>
        <button type="submit" class="bg-blue-500 text-white rounded-md p-2">Update</button>
    </form>
</x-app-layout>
