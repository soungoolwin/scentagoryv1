@extends('components.layout')

@section('content')
    <section class="bg-[#290F11] text-white py-16 px-4">
        <div class="container mx-auto flex flex-col items-center text-center">
            <h1 class="text-5xl font-bold mb-4 sm:text-4xl">Discover Your Signature Scent</h1>
            <p class="text-xl mb-6 sm:text-lg">Premium fragrance decants, carefully curated just for you.</p>
            <a href="#" class="bg-gray-900 text-white px-6 py-3 rounded">Shop Now</a>
        </div>
    </section>

    <section class="bg-[#290F11] py-16 px-4">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="w-full h-[300px] bg-cover bg-center" style="background-image: url('/images/Hero1.jpg');"></div>
            <div class="w-full h-[300px] bg-cover bg-center" style="background-image: url('/images/Hero2.jpg');"></div>
            <div class="w-full h-[300px] bg-cover bg-center" style="background-image: url('/images/Hero3.jpg');"></div>
        </div>
    </section>


    <!-- Featured Products -->
    <!-- Featured Products -->
    <section class="py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-8">Featured Decants</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($featuredDecants as $decant)
                    <div class="border p-4 rounded-lg">
                        <img src="{{ $decant->image }}" alt="{{ $decant->name }}"
                            class="w-full h-48 object-cover rounded" />
                        <h3 class="text-xl font-semibold mt-4">{{ $decant->name }}</h3>
                        <p class="text-gray-600">{{ $decant->priceRange ?? 'Price not available' }}</p>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">
                <a href="{{ route('decants.index') }}" class="bg-gray-900 text-white px-6 py-3 rounded">View More</a>
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
                    <p class="text-gray-600">"ဈေးသင့်တယ်
                        သေချာရှင်းပြပေးတယ်
                        review လေးတွေကိုလည်း တော်တော်ကောင်းကောင်းလေးရေးထားတာတွေ့ရတယ်
                        ဒီနောက်ပိုင်း content အသစ်အဆန်းလေးတွေပါလုပ်လာတာ တော်တော်လေးသဘောကျဖို့ကောင်းတယ်။"</p>
                    <div class="mt-4">
                        <span class="text-yellow-500">★★★★★</span>
                    </div>
                    <p class="mt-2 text-gray-600"> Min Thant Ko</p>
                </div>
                <!-- Review 2 -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-600">"100% safe and authentic and can also give great service to the
                        customers.Admins are very patient and they can recommend the perfume that suit you well.You will not
                        regret for buying from here."</p>
                    <div class="mt-4">
                        <span class="text-yellow-500">★★★★★</span>
                    </div>
                    <p class="mt-2 text-gray-600"> Khant Ye Zaw</p>
                </div>
                <!-- Review 3 -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-600">"တွေ့ရခဲတဲ့ Niche တွေ ပန်းအနံ့လေးတွေကို
                        သေချာတစ်ခုချင်းရှင်းပြထားတာလေးတွေအရမ်းသဘောကျပါတယ်ရှင် ကိုယ်ကလည်း ရေမွှေး Crazy ဆိုတော့
                        အနံ့လေးတွေအကြောင်းဖတ်ရရင်ပျော်နေရော ဒီထက်မကအောင်မြင်ပါစေရှင်"</p>
                    <div class="mt-4">
                        <span class="text-yellow-500">★★★★★</span>
                    </div>
                    <p class="mt-2 text-gray-600"> Phyo Phyo Nyein</p>
                </div>
            </div>
        </div>
    </section>
@endsection
