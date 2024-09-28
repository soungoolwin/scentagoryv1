@extends('components.layout')

@section('content')
    <div class="bg-[#F4F4F4]">
        <div class="container mx-auto py-12 px-4 md:px-0">
            <div class="grid grid-cols-12">
                <div class="md:col-span-1"></div>

                <!-- Filter Column (Optional, you can keep this for brands if you want) -->
                <div class="col-span-12 md:col-span-3 hidden md:block p-4 rounded-md mt-[100px]">
                    <div
                        class="max-w-sm mx-auto bg-white shadow-md rounded-lg overflow-hidden max-h-[2150px] custom-scrollbar">
                        <div class="px-4 py-2 bg-white">
                            <h2 class="text-xl font-bold">Brands</h2>
                        </div>
                        <div class="flex items-center">
                            <span class="w-full border-t border-dotted border-blue-dark"></span>
                        </div>
                        <div>
                            <div class="container px-5 mx-auto">
                                <div class="scroll-container divide-y overflow-auto h-auto">
                                    @foreach ($brands as $brand)
                                        <div class="flex items-start space-x-3 py-6 cursor-pointer">
                                            <div class="flex flex-col">
                                                <h1 class="text-gray-700 jost-300 leading-none">{{ $brand->name }}</h1>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="col-span-12 md:col-span-7">
                    <div class="container mx-auto py-12 px-4 md:px-0">
                        <div class="md:flex justify-between">
                            <h1 class="text-4xl font-semibold mb-5 text-center cormorant-garamond-regular">Decants</h1>
                            <form method="GET" action="{{ route('decants.index') }}"
                                class="flex w-full max-w-lg md:justify-end justify-center mb-5">
                                <input type="text" name="search" placeholder="Search by brand or decant..."
                                    class="p-2 rounded border border-gray-300 h-[42px] w-[70%] focus:outline-none text-black" />
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2">Search</button>
                            </form>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                            @foreach ($decants as $decant)
                                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                    <a href="{{ route('decants.show', $decant->id) }}">
                                        <img src="{{ $decant->image }}" alt="Perfume Image"
                                            class="w-full h-48 object-cover" />
                                        <div class="p-4">
                                            <h2 class="text-xl font-semibold">{{ $decant->name }}</h2>
                                            <p class="text-gray-600">{{ $decant->priceRange ?? 'Price not available' }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Paginator -->
                    <div class="mt-4">
                        {{ $decants->links('pagination::custom') }}
                    </div>
                </div>

                <div class="md:col-span-1"></div>
            </div>
        </div>
    </div>
@endsection
