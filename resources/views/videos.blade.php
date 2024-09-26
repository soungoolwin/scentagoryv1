@extends('components.layout') <!-- Ensure this matches your layout file -->

@section('content')
    <div class="container mx-auto py-12 px-4 md:px-0">
        <div class="grid grid-cols-12 gap-4">
            <div class="lg:col-span-2"></div>
            <div class="col-span-12 lg:col-span-8">
                <h1 class="text-4xl font-semibold mb-8 text-center cormorant-garamond-regular">
                    Review Videos
                </h1>
                <div class="grid gap-6 lg:grid-cols-2">
                    @foreach ($videos as $video)
                        <div class="border rounded-lg overflow-hidden shadow-lg">
                            <div class="aspect-w-16 aspect-h-9">
                                <iframe src="{{ $video['url'] }}" frameborder="0" allowfullscreen
                                    class="w-full h-full"></iframe>
                            </div>
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
            <div class="lg:col-span-2"></div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .aspect-w-16 {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
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

        @media (max-width: 767px) {
            .lg\:col-span-2 {
                display: none;
            }
        }
    </style>
@endsection
