{{-- resources/views/admin/decants/edit.blade.php --}}
<x-app-layout>
    <div class="py-6 px-4 md:px-12">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800">Edit Decant</h2>

        <form action="{{ route('admin.decants.update', $decant->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            {{-- ─── Current Image + optional replacement ─────────────────── --}}
            <div>
                <p class="block text-sm font-semibold text-gray-700">Current Image</p>
                <img src="{{ asset('storage/' . $decant->image) }}" alt="{{ $decant->name }}"
                    class="w-28 h-28 object-cover rounded mb-3">
                <label for="image" class="block text-sm font-semibold text-gray-700">
                    Replace Image (jpg/png/webp ≤ 2 MB) — leave blank to keep
                </label>
                <input type="file" name="image" accept="image/*"
                    class="border border-gray-300 rounded-md p-3 w-full">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- ─── Name / Brand ─────────────────────────────────────────── --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700">Decant Name</label>
                    <input type="text" name="name" value="{{ $decant->name }}" required
                        class="border border-gray-300 rounded-md p-3 w-full focus:ring-blue-500">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="brand_id" class="block text-sm font-semibold text-gray-700">Brand</label>
                    <select name="brand_id" required
                        class="border border-gray-300 rounded-md p-3 w-full focus:ring-blue-500">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $brand->id == $decant->brand_id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- ─── Brand category & Country ─────────────────────────────── --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="brand_category" class="block text-sm font-semibold text-gray-700">Brand Category</label>
                    <input type="text" name="brand_category" value="{{ $decant->brand_category }}"
                        class="border border-gray-300 rounded-md p-3 w-full focus:ring-blue-500">
                    @error('brand_category')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="country" class="block text-sm font-semibold text-gray-700">Country</label>
                    <input type="text" name="country" value="{{ $decant->country }}"
                        class="border border-gray-300 rounded-md p-3 w-full focus:ring-blue-500">
                    @error('country')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- ─── Gender ────────────────────────────────────────────────── --}}
            <div>
                <label for="gender" class="block text-sm font-semibold text-gray-700">Gender</label>
                <select name="gender" class="border border-gray-300 rounded-md p-3 w-full focus:ring-blue-500">
                    <option value="Male" {{ $decant->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $decant->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Unisex" {{ $decant->gender == 'Unisex' ? 'selected' : '' }}>Unisex</option>
                </select>
                @error('gender')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- ─── Description ──────────────────────────────────────────── --}}
            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700">Description</label>
                <textarea name="description" rows="4" class="border border-gray-300 rounded-md p-3 w-full focus:ring-blue-500">{{ $decant->description }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- ─── Accords / Notes ──────────────────────────────────────── --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="scent_accords" class="block text-sm font-semibold text-gray-700">Scent Accords</label>
                    <textarea name="scent_accords" rows="2" class="border border-gray-300 rounded-md p-3 w-full focus:ring-blue-500">{{ $decant->scent_accords }}</textarea>
                    @error('scent_accords')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="top_note" class="block text-sm font-semibold text-gray-700">Top Note</label>
                    <textarea name="top_note" rows="2" class="border border-gray-300 rounded-md p-3 w-full focus:ring-blue-500">{{ $decant->top_note }}</textarea>
                    @error('top_note')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="base_note" class="block text-sm font-semibold text-gray-700">Base Note</label>
                    <textarea name="base_note" rows="2" class="border border-gray-300 rounded-md p-3 w-full focus:ring-blue-500">{{ $decant->base_note }}</textarea>
                    @error('base_note')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- ─── Submit ───────────────────────────────────────────────── --}}
            <button type="submit"
                class="bg-blue-500 text-white font-semibold rounded-md p-3 w-full md:w-auto mt-6 hover:bg-blue-600">
                Update Decant
            </button>
        </form>
    </div>
</x-app-layout>
