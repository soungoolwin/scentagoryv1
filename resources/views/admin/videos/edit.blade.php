<x-app-layout>
    <div class="py-6 px-4 md:px-12">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Video</h2>

        <!-- Edit Video Form -->
        <form action="{{ route('admin.videos.update', $video->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Video Name -->
            <div>
                <label for="name" class="block text-sm font-medium">Video Name</label>
                <input type="text" name="name" value="{{ $video->name }}" required
                    class="border border-gray-300 rounded-md p-2 w-full">
            </div>

            <!-- Video Description -->
            <div>
                <label for="description" class="block text-sm font-medium">Description</label>
                <textarea name="description" required class="border border-gray-300 rounded-md p-2 w-full">{{ $video->description }}</textarea>
            </div>

            <!-- Video URL -->
            <div>
                <label for="url" class="block text-sm font-medium">Video URL</label>
                <input type="url" name="url" value="{{ $video->url }}" required
                    class="border border-gray-300 rounded-md p-2 w-full">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white rounded-md p-3">Update Video</button>
        </form>
    </div>
</x-app-layout>
