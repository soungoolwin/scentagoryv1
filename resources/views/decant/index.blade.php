{{-- @extends('components.layout')

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
                                        <img src="{{ asset('storage/' . $decant->image) }}" alt="Perfume Image"
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
@endsection --}}

@extends('components.layout')

@section('content')
    <div class="bg-gray-100 min-h-screen">
        <div class="container mx-auto py-12 px-4 md:px-0">
            <div class="grid grid-cols-12 gap-8">
                {{-- spacer --}}
                <div class="hidden lg:block lg:col-span-1"></div>

                {{-- ─── Brand sidebar ───────────────────────────────────────── --}}
                <aside
                    class="hidden md:block md:col-span-3 lg:col-span-2 sticky top-24 h-fit bg-white rounded-xl shadow-lg overflow-hidden">
                    {{-- header --}}
                    <div class="px-6 py-4 bg-gradient-to-r from-[#401416] to-[#290F11]">
                        <h2 class="text-lg font-semibold text-white tracking-wide">
                            Filter by Brand
                        </h2>
                    </div>

                    {{-- quick-search inside brands --}}
                    <div class="px-4 py-3 border-b">
                        <input id="brand-search" type="text" placeholder="Quick search…"
                            class="w-full rounded-lg border-gray-300 text-sm focus:ring-2 focus:ring-[#290F11] focus:border-[#290F11]">
                    </div>

                    {{-- list --}}
                    <nav id="brand-list" class="divide-y divide-gray-100 overflow-y-auto custom-scrollbar"
                        style="max-height: 28rem;">
                        @foreach ($brands as $brand)
                            @php $active = request('brand') == $brand->id; @endphp
                            <a href="{{ route('decants.index', array_merge(request()->except('page'), ['brand' => $brand->id])) }}"
                                class="block px-6 py-3 text-sm transition
                                   {{ $active ? 'bg-[#290F11]/10 text-[#290F11] font-medium' : 'text-gray-700 hover:bg-gray-50' }}">
                                {{ $brand->name }}
                            </a>
                        @endforeach
                    </nav>
                </aside>

                {{-- ─── Main content ────────────────────────────────────────── --}}
                <section class="col-span-12 md:col-span-9 lg:col-span-8">
                    {{-- title & global search --}}
                    <div class="md:flex md:items-center md:justify-between mb-8 space-y-4 md:space-y-0">
                        <h1 class="text-3xl font-bold text-gray-800">Decants</h1>

                        <form method="GET" action="{{ route('decants.index') }}" class="flex w-full md:w-80">
                            @if (request('brand'))
                                <input type="hidden" name="brand" value="{{ request('brand') }}">
                            @endif
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Search decants…"
                                class="flex-grow border border-gray-300 px-3 py-2 text-sm rounded-l-lg focus:ring-2 focus:ring-[#290F11] focus:border-[#290F11]">
                            <button type="submit"
                                class="bg-[#290F11] text-white px-4 rounded-r-lg text-sm hover:bg-[#3b1719] transition">
                                Search
                            </button>
                        </form>
                    </div>

                    {{-- decant cards --}}
                    <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($decants as $decant)
                            <div class="bg-white rounded-xl shadow hover:shadow-lg transition">
                                <a href="{{ route('decants.show', $decant->id) }}">
                                    <div class="relative w-full aspect-[3/4] bg-gray-100">
                                        <img src="{{ asset('storage/' . $decant->image) }}" alt="{{ $decant->name }}"
                                            class="absolute inset-0 w-full h-full object-contain p-2">
                                    </div>
                                    <div class="p-4 space-y-1">
                                        <h3 class="text-lg font-semibold text-gray-800 truncate">
                                            {{ $decant->name }}
                                        </h3>
                                        <p class="text-sm text-gray-500">
                                            {{ $decant->priceRange ?? 'Price N/A' }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    {{-- pagination --}}
                    <div class="mt-8">
                        {{ $decants->withQueryString()->links('pagination::custom') }}
                    </div>
                </section>

                {{-- spacer --}}
                <div class="hidden lg:block lg:col-span-1"></div>
            </div>
        </div>
    </div>

    {{-- brand list live-filter --}}
    <script>
        const input = document.getElementById('brand-search');
        const list = document.getElementById('brand-list');

        if (input) {
            input.addEventListener('input', e => {
                const q = e.target.value.toLowerCase();
                [...list.children].forEach(a => {
                    a.style.display = a.textContent.toLowerCase().includes(q) ? '' : 'none';
                });
            });
        }
    </script>
@endsection
