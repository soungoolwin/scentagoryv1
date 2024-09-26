<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        footer a {
            color: white;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .line-container {
            display: flex;
            justify-content: center;
        }

        .custom-line {
            width: 50%;
            /* Adjust the width as needed */
            border: 1px solid #000;
            /* Adjust the color and thickness */
            margin-top: 20px;
            /* Adjust the spacing as needed */
        }
    </style>
    @yield('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div>
        <nav class="bg-[#290E11] text-white">
            <div class="container mx-auto py-6 px-4 md:px-0">
                <div class="grid grid-cols-12 gap-4">
                    <!-- Left free space on large screens -->
                    <div class="lg:col-span-1"></div>

                    <div class="col-span-12 lg:col-span-10">
                        <div class="grid grid-cols-12 gap-4">
                            <!-- Logo -->
                            <div class="col-span-6 md:col-span-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 mr-2 md:hidden block cursor-pointer" onclick="toggleMenu()">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                </svg>
                                <a href="#" class="text-xl font-bold">Scentagory</a>
                            </div>

                            <!-- Social Links -->
                            <div class="col-span-6 md:col-span-8 flex justify-end items-center">
                                <a href="https://www.facebook.com/Scentagory" class="hover:underline px-2"><i
                                        class="fa-brands fa-facebook"></i></a>
                                <a href="#" class="hover:underline px-2"><i class="fa-brands fa-youtube"></i></a>
                                <a href="https://t.me/scentagory" class="hover:underline px-2"><i
                                        class="fa-brands fa-telegram"></i></a>
                                <a href="https://www.tiktok.com/@scentagory?_t=8n1x1ekEvzj&_r=1"
                                    class="hover:underline px-2"><i class="fa-brands fa-tiktok"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Right free space on large screens -->
                    <div class="lg:col-span-1"></div>
                </div>
            </div>
        </nav>

        <nav class="bg-[#290E11] p-4 md:block hidden">
            <div class="container mx-auto flex items-center justify-center">
                <ul class="flex justify-center space-x-4">
                    <li><a href="{{ url('/') }}" class="hover:underline px-5 text-white">Home</a></li>
                    <li><a href="{{ url('/about-us') }}" class="hover:underline px-5 text-white">About</a></li>
                    <li><a href="{{ url('/products/decants') }}" class="hover:underline px-5 text-white">Products</a>
                    </li>
                    <li><a href="{{ url('/review-videos') }}" class="hover:underline px-5 text-white">Review Videos</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Full-screen Navigation -->
        <div id="fullScreenMenu" class="fixed inset-0 bg-[#290E11] bg-opacity-95 z-50 hidden">
            <div class="container mx-auto p-4 flex flex-col">
                <button class="self-end text-white" onclick="toggleMenu()">
                    <i class="fa-solid fa-times text-2xl"></i>
                </button>
                <ul class="flex flex-col justify-center flex-grow space-y-4 mt-[40px]">
                    <li onclick="toggleMenu()" class="flex justify-between cursor-pointer">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white ml-3 mr-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <a href="{{ url('/') }}" class="hover:underline text-white text-xl">Home</a>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </li>
                    <li onclick="toggleMenu()" class="flex justify-between pt-3 cursor-pointer">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-3 mr-4 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                            </svg>
                            <a href="{{ url('/about-us') }}" class="hover:underline text-white text-xl">About</a>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </li>
                    <li onclick="toggleMenu()" class="flex justify-between pt-3 cursor-pointer">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-3 mr-4 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 2C13.476 2 14.826 2.329 15.955 2.916c1.122.576 2.086 1.395 2.634 2.447.517 1.042.727 2.179.527 3.318-.245 1.371-1.43 2.251-2.877 2.251H7.5v1.5h10.044c.222 0 .398-.175.398-.394 0-.333-.267-.652-.682-.823-.87-.3-1.626-.842-2.092-1.547a3.19 3.19 0 0 0-.496-.571C12.925 6.187 12.156 6 11.25 6H3a3 3 0 0 0-3 3v2.75h1.5V9a1.5 1.5 0 0 1 1.5-1.5h8.437c.292 0 .557-.21.63-.5.079-.41-.181-.757-.635-.757H5.25a1.5 1.5 0 0 0-1.5 1.5v5.75a4.497 4.497 0 0 0 4.485 4.494 3.755 3.755 0 0 0 3.472 2.008c1.471 0 2.826-.66 3.65-1.688 1.46-1.783 1.998-4.5 1.687-6.758-.133-.736-.523-1.372-1.022-1.858C17.479 6.421 15.925 5 12 5h-.75V2H12z" />
                            </svg>
                            <a href="{{ url('/products/decants') }}"
                                class="hover:underline text-white text-xl">Products</a>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </li>
                    <li onclick="toggleMenu()" class="flex justify-between pt-3 cursor-pointer">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-3 mr-4 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.538 8.79l-1.062 1.062L21.249 12l-1.773 1.146 1.062 1.062A9.977 9.977 0 0 1 12 21c-4.044 0-7.582-2.38-9.01-5.845L6 16.25l1.5-1.5-1.773-1.146 1.062-1.062A9.977 9.977 0 0 1 12 3c4.044 0 7.582 2.38 9.01 5.845zM12 18.75c-3.092 0-5.668-1.627-7.238-4.075L12 12l7.238 2.675C17.668 17.123 15.092 18.75 12 18.75zM12 7.5a4.5 4.5 0 1 0 0 9 4.5 4.5 0 0 0 0-9z" />
                            </svg>
                            <a href="{{ url('/review-videos') }}" class="hover:underline text-white text-xl">Review
                                Videos</a>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @yield('content')

    <footer class="bg-[#290E11] text-white py-8">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-12 gap-5 px-5 md:px-0">
            <!-- First Column: Logo and Social Links -->
            <div class="col-span-4 mx-auto my-auto">
                <img src="{{ asset('images/logo.png') }}" alt="Scentagory Logo"
                    class="w-[100px] h-[100px] mx-auto" />
                <div class="text-xl font-bold mb-4 text-center">Scentagory</div>
                <div class="flex space-x-4 mb-4">
                    <a href="https://www.facebook.com/Scentagory" class="hover:underline">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="#" class="hover:underline">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a href="https://t.me/scentagory" class="hover:underline">
                        <i class="fa-brands fa-telegram"></i>
                    </a>
                    <a href="https://www.tiktok.com/@scentagory?_t=8n1x1ekEvzj&_r=1" class="hover:underline">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                </div>
            </div>

            <!-- Second Column: Navigation Links -->
            <div class="col-span-4 mx-auto my-auto">
                <h3 class="font-bold mb-4">About Us</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ url('/about-us') }}" class="hover:underline">About Us</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Products</a>
                    </li>
                </ul>
            </div>

            <!-- Third Column: Contact Information -->
            <div class="col-span-4 mx-auto my-auto">
                <h3 class="font-bold mb-4 text-center">Contact Us</h3>
                <ul class="space-y-2 text-center">
                    <li>
                        <span class="block">32A 73x74, Aung Thu Kha Street, Chan Aye Thar Zan, Mandalay, 05021</span>
                    </li>
                    <li>
                        <span class="block">Phone: (+95) 9969180634</span>
                    </li>
                    <li>
                        <span class="block">Email: scentagory.official@gmail.com</span>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</body>

<script>
    function toggleMenu() {
        const menu = document.getElementById('fullScreenMenu');
        menu.classList.toggle('hidden');
    }
</script>

</html>
