@extends('components.layout')

@section('content')
    <div class="container mx-auto py-12 px-4 md:px-0">
        <div class="grid grid-cols-12">
            <div class="col-span-1 lg:col-span-2"></div>
            <!-- Left spacing -->
            <div class="col-span-10 lg:col-span-8">
                <h1 class="text-4xl font-semibold mb-6 cormorant-garamond-regular">
                    About Scentagory
                </h1>
                <p class="mb-8 text-gray-700">
                    Welcome to Scentagory, where we redefine your fragrance experience. Our curated selection caters to the
                    discerning noses, offering an exquisite array of scents that resonate with your unique identity.
                </p>

                <!-- Stylish line -->
                <div class="line-container mb-10">
                    <hr class="custom-line" />
                </div>

                <div class="grid md:grid-cols-2">
                    <div>
                        <img src="{{ asset('images/story.jpg') }}" alt="Our Story"
                            class="w-full md:h-[500px] h-[300px] object-cover rounded-lg shadow-lg" />
                    </div>
                    <div class="flex items-center justify-center h-full flex-col">
                        <h2 class="text-3xl font-semibold mb-4 cormorant-garamond-regular md:mt-0 mt-5">
                            Our Story
                        </h2>
                        <p class="md:px-[60px] px-[20px] text-gray-600">
                            At Scentagory, we believe in the art of fragrance. Our journey began with a passion for quality
                            and a desire to share the finest scents with the world. Every bottle tells a story, and we
                            invite you to be part of ours.
                        </p>
                    </div>
                </div>

                <!-- Stylish line -->
                <div class="line-container my-10">
                    <hr class="custom-line md:hidden block" />
                </div>

                <div class="grid md:grid-cols-2 gap-8 mt-5">
                    <div class="flex items-center justify-center h-full flex-col">
                        <h2 class="text-3xl font-semibold mb-4 cormorant-garamond-regular md:mt-0 mt-5">
                            Our Vision
                        </h2>
                        <p class="md:px-[60px] px-[20px] text-gray-600">
                            Our vision is to create an immersive shopping experience where fragrance lovers can explore,
                            sample, and discover their signature scents in a welcoming and luxurious environment. We aim to
                            offer a diverse range of perfumes, from affordable options to exclusive niche brands.
                        </p>
                    </div>
                    <div>
                        <img src="{{ asset('images/vision.jpeg') }}" alt="Our Vision"
                            class="w-full md:h-[500px] h-[300px] object-cover rounded-lg shadow-lg" />
                    </div>
                </div>
            </div>
            <div class="col-span-1 lg:col-span-2"></div>
            <!-- Right spacing -->
        </div>
    </div>
@endsection
