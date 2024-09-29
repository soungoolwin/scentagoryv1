@extends('components.layout')

@section('content')
    <div class="bg-gray-100 min-h-screen">
        <div class="container mx-auto py-12 px-4 md:px-0">
            <div class="grid grid-cols-12 gap-8">
                <!-- Spacer for Alignment -->
                <div class="md:col-span-1"></div>

                <!-- Brand Filter Column -->
                <div class="col-span-12 md:col-span-3 hidden md:block p-0 bg-white shadow rounded-lg">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden" style="height: auto;">
                        <div class="px-4 py-2">
                            <h2 class="text-xl font-bold text-gray-800">Brands</h2>
                        </div>
                        <div class="w-full border-t border-dotted border-gray-300 mb-4"></div>

                        <div class="px-4 overflow-y-auto custom-scrollbar text-center" id="brand-list"
                            style="max-height: 0;">
                            @foreach ($brands as $brand)
                                <div class="py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-50 transition">
                                    <h1 class="text-gray-700 font-medium text-sm">{{ $brand->name }}</h1>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Main Content Column (Decants) -->
                <div class="col-span-12 md:col-span-7">
                    <div class="mx-auto">
                        <div class="md:flex justify-between items-center mb-6">
                            <h1 class="text-4xl font-bold text-center text-gray-800">Decants</h1>
                            <!-- Search Bar -->
                            <form method="GET" action="{{ route('decants.index') }}"
                                class="flex items-center w-full md:w-1/2">
                                <input type="text" name="search" placeholder="Search by brand or decant..."
                                    class="p-2 rounded-l-md border border-gray-300 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" />
                                <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition">
                                    Search
                                </button>
                            </form>
                        </div>

                        <!-- Decants Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                            @foreach ($decants as $decant)
                                <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition">
                                    <a href="{{ route('decants.show', $decant->id) }}" class="block">
                                        <img src="{{ $decant->image }}" alt="Perfume Image"
                                            class="w-full h-48 object-cover rounded-t-lg" />
                                        <div class="p-4">
                                            <h2 class="text-xl font-semibold text-gray-900">{{ $decant->name }}</h2>
                                            <p class="text-gray-600">{{ $decant->priceRange ?? 'Price not available' }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        <!-- Paginator -->
                        <div class="mt-6">
                            {{ $decants->links('pagination::custom') }}
                        </div>
                    </div>
                </div>

                <!-- Spacer for Alignment -->
                <div class="md:col-span-1"></div>
            </div>
        </div>
    </div>

    <script>
        // Set the brand list height to match the decant section height
        function adjustBrandHeight() {
            var decantSection = document.querySelector('.col-span-12.md\\:col-span-7');
            var decantSectionHeight = decantSection.getBoundingClientRect().height;
            var brandList = document.getElementById('brand-list');

            // Adjust the brand list max-height to be the same as the decant section
            brandList.style.maxHeight = decantSectionHeight + 'px';
        }

        window.addEventListener('load', adjustBrandHeight);
        window.addEventListener('resize', adjustBrandHeight);
    </script>
@endsection
