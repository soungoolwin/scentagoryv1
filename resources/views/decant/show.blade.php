@extends('components.layout')

@section('content')
    <div class="bg-[#F4F4F4]">
        <div class="container mx-auto py-12 px-4 md:px-0">
            <div class="grid grid-cols-12 gap-10">
                <div class="md:col-span-1"></div>
                <div class="col-span-12 md:col-span-10 bg-[#FFFFFF] rounded-lg">
                    <div class="container mx-auto py-12 px-4 md:px-0">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Image Column -->
                            <div class="flex justify-center items-center">
                                <img src="{{ $decant->image }}" alt="Perfume Image"
                                    class="w-[490px] h-[490px] object-cover rounded-lg" />
                            </div>

                            <!-- Decant Information Column -->
                            <div class="flex flex-col justify-center space-y-6">
                                <h1 class="text-3xl font-semibold cormorant-garamond-regular">
                                    {{ $decant->name }}
                                </h1>
                                <p class="text-xl text-gray-600">
                                    {{ $priceRange }}
                                </p>

                                <!-- Size Selector -->
                                <div class="w-64">
                                    <label for="sizes" class="block text-sm font-medium text-gray-700">
                                        Decant Size
                                    </label>

                                    <!-- Form to submit on size change -->
                                    <form id="size-form" method="GET" action="{{ route('decants.show', $decant->id) }}">
                                        <select id="sizes" name="size_id"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            onchange="document.getElementById('size-form').submit()">
                                            @foreach ($decant->prices as $price)
                                                <option value="{{ $price->size->id }}"
                                                    {{ $selectedPrice->size_id == $price->size->id ? 'selected' : '' }}>
                                                    {{ $price->size->size }} ml
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>

                                    <p class="text-xl text-gray-600 mt-5">
                                        {{ $selectedPrice->price }} MMK
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-1"></div>
            </div>
        </div>
    </div>
@endsection
