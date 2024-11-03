<x-app-layout>
    <div class="py-6 px-4 md:px-12">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Size</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-6 rounded-md">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.sizes.update', $size->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Size Input -->
                <div>
                    <label for="size" class="block text-sm font-medium">Size</label>
                    <input type="text" name="size" value="{{ old('size', $size->size) }}" required
                        class="border border-gray-300 rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <button type="submit" class="bg-blue-500 text-white rounded-md p-3 hover:bg-blue-600 transition-colors">
                Update Size
            </button>
        </form>
    </div>
</x-app-layout>
