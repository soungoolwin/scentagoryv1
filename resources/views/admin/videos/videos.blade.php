<x-app-layout>
    <div class="py-6 px-4 md:px-12">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Manage Videos</h2>

        <!-- Video Listing -->
        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-4">All Videos</h3>
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2">Video Name</th>
                        <th class="py-2">Description</th>
                        <th class="py-2">URL</th>
                        <th class="py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($videos as $video)
                        <tr class="text-center">
                            <td class="py-2 border-b border-gray-200">{{ $video->name }}</td>
                            <td class="py-2 border-b border-gray-200">{{ Str::limit($video->description, 50) }}</td>
                            <td class="py-2 border-b border-gray-200">
                                <a href="{{ $video->url }}" target="_blank" class="text-blue-500">Watch Video</a>
                            </td>
                            <td class="py-2 border-b border-gray-200">
                                <a href="{{ route('admin.videos.edit', $video->id) }}" class="text-blue-500">Edit</a>
                                <form action="{{ route('admin.videos.delete', $video->id) }}" method="POST"
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
        </div>

        <!-- Add New Video Form -->
        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-4">Add New Video</h3>
            <form action="{{ route('admin.videos.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- Video Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium">Video Name</label>
                        <input type="text" name="name" required
                            class="border border-gray-300 rounded-md p-2 w-full">
                    </div>

                    <!-- Video Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium">Video Description</label>
                        <textarea name="description" required class="border border-gray-300 rounded-md p-2 w-full"></textarea>
                    </div>

                    <!-- Video URL -->
                    <div class="md:col-span-2">
                        <label for="url" class="block text-sm font-medium">Video URL</label>
                        <input type="text" name="url" required
                            class="border border-gray-300 rounded-md p-2 w-full">
                    </div>
                </div>

                <!-- Display any error messages -->
                @if ($errors->has('error'))
                    <div class="text-red-500 mb-4">
                        {{ $errors->first('error') }}
                    </div>
                @endif

                <!-- Submit Button -->
                <button type="submit" class="bg-blue-500 text-white rounded-md p-3">Add Video</button>
            </form>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $videos->links() }} <!-- Pagination links -->
        </div>
    </div>
</x-app-layout>
