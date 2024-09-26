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
                             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6 mr-2 md:hidden block" @click="toggleMenu">
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
                 <li>
                     <Link href="/" class="hover:underline px-5 text-white">Home</Link>
                 </li>
                 <li>
                     <Link href="/about-us" class="hover:underline px-5 text-white">About</Link>
                 </li>
                 <li>
                     <Link href="/products/decants" class="hover:underline px-5 text-white">Products</Link>
                 </li>
                 <li>
                     <Link href="/review-videos" class="hover:underline px-5 text-white">Review Videos</Link>
                 </li>
             </ul>
         </div>
     </nav>

     <!-- Full-screen Navigation -->
     <div v-show="isMenuOpen" class="fixed inset-0 bg-[#290E11] bg-opacity-95 z-50">
         <div class="container mx-auto p-4 flex flex-col">
             <button class="self-end text-white" @click="toggleMenu">
                 <i class="fa-solid fa-times text-2xl"></i>
             </button>
             <ul class="flex flex-col justify-center flex-grow space-y-4 mt-[40px]">
                 <li @click="toggleMenu" class="flex justify-between">
                     <div class="flex">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6 text-white ml-3 mr-4">
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                         </svg>

                         <a href="#" class="hover:underline text-white text-xl">Home</a>
                     </div>

                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6 text-white">
                         <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                     </svg>
                 </li>
                 <li @click="toggleMenu" class="flex justify-between pt-3">
                     <div class="flex">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6 ml-3 mr-4 text-white">
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                         </svg>

                         <Link href="/about-us" class="hover:underline text-white text-xl">About</Link>
                     </div>
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6 text-white">
                         <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                     </svg>
                 </li>
                 <li @click="toggleMenu" class="flex justify-between pt-3">
                     <div class="flex">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6 ml-3 mr-4 text-white">
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M12 2C13.1046 2 14 2.89543 14 4V5H16C16.5523 5 17 5.44772 17 6V8C17 8.55228 16.5523 9 16 9H8C7.44772 9 7 8.55228 7 8V6C7 5.44772 7.44772 5 8 5H10V4C10 2.89543 10.8954 2 12 2Z" />
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M7 11V19C7 20.1046 7.89543 21 9 21H15C16.1046 21 17 20.1046 17 19V11H7Z" />
                             <path stroke-linecap="round" stroke-linejoin="round" d="M10 5H14V7H10V5Z" />
                         </svg>

                         <Link href="/products/decants" class="hover:underline text-white text-xl">Products</Link>
                     </div>

                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6 text-white">
                         <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                     </svg>
                 </li>
                 <li @click="toggleMenu" class="flex justify-between pt-3">
                     <div class="flex">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-3 mr-4 text-white">
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                         </svg>

                         <Link href="/review-videos" class="hover:underline text-white text-xl">Review Videos</Link>
                     </div>

                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6 text-white">
                         <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                     </svg>
                 </li>
             </ul>
         </div>
     </div>

     <main>
         <slot></slot>
     </main>
 </div>


 <script>
     // import { Link } from "@inertiajs/vue3";
     import {
         Link
     } from "@inertiajs/inertia-vue3";
     export default {
         components: {
             Link,
         },
         data() {
             return {
                 isMenuOpen: false,
             };
         },
         methods: {
             toggleMenu() {
                 this.isMenuOpen = !this.isMenuOpen;
             },
         },
     };
 </script>

 <style scoped>
     .cursor-pointer {
         cursor: pointer;
     }
 </style>
