@extends('components.layout') <!-- Ensure this matches your layout file -->

@section('content')
    <div class="container mx-auto py-12 px-4 md:px-0">
        <!-- Main grid container with padding and center alignment -->
        <div class="grid grid-cols-12 gap-4">
            <!-- Empty column for spacing on larger screens -->
            <div class="lg:col-span-2"></div>

            <!-- Main content column spanning 8 columns on large screens, 12 on smaller screens -->
            <div class="col-span-12 lg:col-span-8">
                <!-- Page title with custom font and centered text -->
                <h1 class="text-4xl font-semibold mb-8 text-center cormorant-garamond-regular">
                    Review Videos
                </h1>

                <!-- "Coming Soon" message for future videos with styled text -->
                <div class="text-center py-20">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-800" style="font-family: 'Cormorant Garamond', serif;">
                        Coming Soon!
                    </h2>
                    <p class="text-xl text-gray-600">Stay tuned for our exclusive review videos.</p>
                </div>

                <!-- Grid for video content (hidden until videos are added) -->
                <div class="grid gap-6 lg:grid-cols-2 hidden">
                    @foreach ($videos as $video)
                        <!-- Video card with shadow and rounded corners -->
                        <div class="border rounded-lg overflow-hidden shadow-lg">
                            <!-- Aspect ratio box for responsive video embedding -->
                            <div class="aspect-w-16 aspect-h-9">
                                <iframe src="{{ $video['url'] }}" frameborder="0" allowfullscreen
                                    class="w-full h-full"></iframe>
                            </div>
                            <!-- Video content section with title and description -->
                            <div class="p-6">
                                <h2 class="text-xl font-semibold mb-2 cormorant-garamond-regular">
                                    {{ $video['name'] }}
                                </h2>
                                <p class="text-gray-600 cormorant-garamond-regular">
                                    {{ $video['description'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Empty column for spacing on larger screens -->
            <div class="lg:col-span-2"></div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* Aspect ratio for 16:9 video embedding */
        .aspect-w-16 {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
        }

        .aspect-h-9 {
            height: 0;
        }

        .aspect-w-16 iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        /* Hide empty columns on smaller screens */
        @media (max-width: 767px) {
            .lg\:col-span-2 {
                display: none;
            }
        }
    </style>
@endsection
