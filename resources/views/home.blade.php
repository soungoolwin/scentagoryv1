@extends('components.layout')

@section('content')
    <section class="bg-cover bg-center h-[600px]" style="background-image: url('/images/test.jpg')">
        <div class="container mx-auto px-4 h-full flex flex-col justify-center items-center text-center text-white">
            <h1 class="text-5xl font-bold mb-4">Discover Your Signature Scent</h1>
            <p class="text-xl mb-6">Premium fragrance decants, carefully curated just for you.</p>
            <a href="#" class="bg-gray-900 text-white px-6 py-3 rounded">Shop Now</a>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-8">Featured Decants</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Product 1 -->
                <div class="border p-4 rounded-lg">
                    <img src="https://example.com/product1.jpg" alt="Product 1" class="w-full h-48 object-cover rounded" />
                    <h3 class="text-xl font-semibold mt-4">Product 1</h3>
                    <p class="text-gray-600">$29.99</p>
                </div>
                <!-- Product 2 -->
                <div class="border p-4 rounded-lg">
                    <img src="https://example.com/product2.jpg" alt="Product 2" class="w-full h-48 object-cover rounded" />
                    <h3 class="text-xl font-semibold mt-4">Product 2</h3>
                    <p class="text-gray-600">$29.99</p>
                </div>
                <!-- Product 3 -->
                <div class="border p-4 rounded-lg">
                    <img src="https://example.com/product3.jpg" alt="Product 3" class="w-full h-48 object-cover rounded" />
                    <h3 class="text-xl font-semibold mt-4">Product 3</h3>
                    <p class="text-gray-600">$29.99</p>
                </div>
                <!-- Product 4 -->
                <div class="border p-4 rounded-lg">
                    <img src="https://example.com/product4.jpg" alt="Product 4" class="w-full h-48 object-cover rounded" />
                    <h3 class="text-xl font-semibold mt-4">Product 4</h3>
                    <p class="text-gray-600">$29.99</p>
                </div>
            </div>
            <div class="mt-8">
                <a href="#" class="bg-gray-900 text-white px-6 py-3 rounded">View More</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-8">About Us</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Welcome to Decant Shop, your go-to destination for premium fragrance decants. Our mission is to provide you
                with an exquisite selection of scents, carefully curated to suit your unique taste. Discover the perfect
                fragrance that resonates with your personality.
            </p>
        </div>
    </section>

    <!-- Customer Reviews -->
    <section class="py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-8">What Our Customers Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Review 1 -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-600">"Amazing selection and top-notch service. I'm in love with my new scent!"</p>
                    <div class="mt-4">
                        <span class="text-yellow-500">★★★★★</span>
                    </div>
                    <p class="mt-2 text-gray-600">- Customer Name</p>
                </div>
                <!-- Review 2 -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-600">"Great quality and fast shipping. Highly recommend!"</p>
                    <div class="mt-4">
                        <span class="text-yellow-500">★★★★★</span>
                    </div>
                    <p class="mt-2 text-gray-600">- Customer Name</p>
                </div>
                <!-- Review 3 -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-600">"I'm very happy with my purchase. Will definitely buy again!"</p>
                    <div class="mt-4">
                        <span class="text-yellow-500">★★★★★</span>
                    </div>
                    <p class="mt-2 text-gray-600">- Customer Name</p>
                </div>
            </div>
        </div>
    </section>
@endsection
