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
        <!-- Top Navigation Bar -->
        <nav class="bg-[#290E11] text-white">
            <div class="container mx-auto px-4 md:px-0">
                <div class="grid grid-cols-12 gap-4">
                    <!-- Left free space on large screens -->
                    <div class="lg:col-span-1"></div>

                    <div class="col-span-12 lg:col-span-10">
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-6 md:col-span-4 flex items-center py-0">
                                <img src="{{ asset('images/logo.png') }}" class="w-[130px] h-[130px]" alt="">
                            </div>

                            <!-- Social Links (Hidden on small screens) -->
                            <div class="col-span-6 md:col-span-8 justify-end items-center hidden md:flex">
                                <a href="https://www.facebook.com/Scentagory" class="hover:underline px-2"><i
                                        class="fa-brands fa-facebook"></i></a>
                                <a href="#" class="hover:underline px-2"><i class="fa-brands fa-youtube"></i></a>
                                <a href="https://t.me/scentagory" class="hover:underline px-2"><i
                                        class="fa-brands fa-telegram"></i></a>
                                <a href="https://www.tiktok.com/@scentagory?_t=8n1x1ekEvzj&_r=1"
                                    class="hover:underline px-2"><i class="fa-brands fa-tiktok"></i></a>
                            </div>

                            <!-- Menu Toggle Button (Visible on small screens) -->
                            <div class="col-span-6 md:hidden flex justify-end items-center">
                                <button onclick="toggleMenu()" class="text-white">
                                    <i class="fa-solid fa-bars text-2xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Right free space on large screens -->
                    <div class="lg:col-span-1"></div>
                </div>
            </div>
        </nav>

        <!-- Full-screen Navigation for Small Screens -->
        <div id="fullScreenMenu" class="fixed inset-0 bg-[#290E11] bg-opacity-95 z-50 hidden">
            <div class="container mx-auto p-4 flex flex-col">
                <button class="self-end text-white" onclick="toggleMenu()">
                    <i class="fa-solid fa-times text-2xl"></i>
                </button>
                <ul class="flex flex-col justify-center flex-grow space-y-4 mt-[40px]">
                    <li onclick="toggleMenu()" class="flex justify-between cursor-pointer">
                        <div class="flex">
                            <i class="fas fa-home w-6 h-6 text-white ml-3 mr-4 mt-1"></i>
                            <a href="{{ url('/') }}" class="hover:underline text-white text-xl">Home</a>
                        </div>
                    </li>
                    <li onclick="toggleMenu()" class="flex justify-between pt-3 cursor-pointer">
                        <div class="flex">
                            <i class="fas fa-info-circle w-6 h-6 text-white ml-3 mr-4 mt-1"></i>
                            <a href="{{ url('/about-us') }}" class="hover:underline text-white text-xl">About</a>
                        </div>
                    </li>
                    <li onclick="toggleMenu()" class="flex justify-between pt-3 cursor-pointer">
                        <div class="flex">
                            <i class="fas fa-box-open w-6 h-6 text-white ml-3 mr-4 mt-1"></i>
                            <a href="{{ url('/decants') }}" class="hover:underline text-white text-xl">Products</a>
                        </div>
                    </li>
                    <li onclick="toggleMenu()" class="flex justify-between pt-3 cursor-pointer">
                        <div class="flex">
                            <i class="fas fa-video w-6 h-6 text-white ml-3 mr-4 mt-1"></i>
                            <a href="{{ url('/review-videos') }}" class="hover:underline text-white text-xl">Review
                                Videos</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Desktop Navigation (Visible on larger screens) -->
        <nav class="bg-[#290E11] p-4 md:block hidden">
            <div class="container mx-auto flex items-center justify-center">
                <ul class="flex justify-center space-x-4">
                    <li><a href="{{ url('/') }}" class="hover:underline px-5 text-white">Home</a></li>
                    <li><a href="{{ url('/about-us') }}" class="hover:underline px-5 text-white">About</a></li>
                    <li><a href="{{ url('/decants') }}" class="hover:underline px-5 text-white">Products</a>
                    </li>
                    <li><a href="{{ url('/review-videos') }}" class="hover:underline px-5 text-white">Review
                            Videos</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    @yield('content')

    <footer class="bg-[#290E11] text-white py-8">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-12 gap-5 px-5 md:px-0">
            <!-- First Column: Logo and Social Links -->
            <div class="col-span-4 mx-auto my-auto">
                <img src="{{ asset('images/logo.png') }}" alt="Scentagory Logo" class="w-[100px] h-[100px] mx-auto" />
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
                        <a href="{{ url('/products/decants') }}" class="hover:underline">Products</a>
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
