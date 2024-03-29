
@extends('user.layouts.app')

@section('title', 'Gathering In Bali')

@push('css')
    <!-- Add Swiper JS and CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

@endpush

@section('content')
    <div class="container max-w-7xl mx-auto  w-full h-full">
        <div class="swiper mx-auto" data-aos="fade-up">
            <div class="swiper-container" style="height: 400px; margin: 5% 0px;">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="mx-auto rounded-lg" src="{{ asset('images/hero-slide-3.webp') }}" alt="Slide 1">
                    </div>
                    <div class="swiper-slide">
                        <img class="mx-auto rounded-lg" src="{{ asset('images/hero-slide-3.webp') }}" alt="Slide 1">
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="flex flex-col -mt-8">
            <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

            <div class="flex items-start rounded-xl bg-white px-4 py-6 shadow-lg">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-100 bg-indigo-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                </div>

                <div class="ml-4">
                <h2 class="font-semibold">1823 Users</h2>
                <p class="mt-2 text-sm text-gray-500">Have been joined</p>
                </div>
            </div>
            <div class="flex items-start rounded-xl bg-white px-4 py-6 shadow-lg">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border border-red-100 bg-indigo-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                </div>

                <div class="ml-4">
                <h2 class="font-semibold">548 Program</h2>
                <p class="mt-2 text-sm text-gray-500">Has been completed</p>
                </div>
            </div>
            <div class="flex items-start rounded-xl bg-white px-4 py-6 shadow-lg">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-100 bg-indigo-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 5V4C6 2.34315 7.34315 1 9 1H15C16.6569 1 18 2.34315 18 4V5H20C21.6569 5 23 6.34315 23 8V20C23 21.6569 21.6569 23 20 23H4C2.34315 23 1 21.6569 1 20V8C1 6.34315 2.34315 5 4 5H6ZM8 4C8 3.44772 8.44772 3 9 3H15C15.5523 3 16 3.44772 16 4V5H8V4ZM19.882 7H4.11803L6.34164 11.4472C6.51103 11.786 6.8573 12 7.23607 12H11C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12H16.7639C17.1427 12 17.489 11.786 17.6584 11.4472L19.882 7ZM11 14H7.23607C6.09975 14 5.06096 13.358 4.55279 12.3416L3 9.23607V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V9.23607L19.4472 12.3416C18.939 13.358 17.9002 14 16.7639 14H13C13 14.5523 12.5523 15 12 15C11.4477 15 11 14.5523 11 14Z"/>
                        </svg>
                </div>

                <div class="ml-4">
                <h2 class="font-semibold">20+ Partner</h2>
                <p class="mt-2 text-sm text-gray-500">Has been joined</p>
                </div>
            </div>
            <div class="flex items-start rounded-xl bg-white px-4 py-6 shadow-lg">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border border-indigo-100 bg-indigo-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
                </div>

                <div class="ml-4">
                <h2 class="font-semibold">129+ Feedback</h2>
                <p class="mt-2 text-sm text-gray-500">Users have give to us</p>
                </div>
            </div>
            </div>
        </div> --}}




        <div class="w-full h-full flex items-center mt-8">
            <div class="flex justify-center w-full mx-auto">
                {{-- <div class="text-gray-600 absolute ml-3 inset-0 m-auto w-4 h-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <circle cx="10" cy="10" r="7" />
                        <line x1="21" y1="21" x2="15" y2="15" />
                    </svg>
                </div> --}}
                <input class="w-[90%] border border-gray-100 focus:outline-none focus:border-indigo-700 rounded-md shadow-lg text-sm text-gray-500 placeholder-gray-600 bg-white pl-8 py-2" type="text" placeholder="Search" />
            </div>
        </div>

        <section class="bootcamp my-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="bootcamp/detail/1" class="block bg-white rounded-xl overflow-hidden shadow-lg">
                    <img class="h-54 w-full object-cover" src="{{ asset('images/public.avif') }}" alt="Card Image">
                    <div class="p-4">
                        <div class="font-bold text-xl mb-2 line-clamp-2">DIGITAL MARKETING: FULLSTACK INTENSIVE BOOTCAMP</div>
                        <p class="text-gray-700 text-base">
                            <span id="date" class="block mb-1 text-sm">
                                <i class="fa-solid fa-calendar-days mr-2"></i> 21 - 25 March 2023
                            </span>
                            <span id="time" class="block mb-1 text-sm">
                                <i class="fa-solid fa-clock mr-2"></i> 09.00 - 17.00
                            </span>
                            <span id="price" class="block mb-1 text-sm">
                                <i class="fa-solid fa-tag mr-2"></i> Rp. 150000
                            </span>
                        </p>
                    </div>
                </a>
                <a href="bootcamp/detail/1" class="block bg-white rounded-xl overflow-hidden shadow-lg">
                    <img class="h-54 w-full object-cover" src="{{ asset('images/public.avif') }}" alt="Card Image">
                    <div class="p-4">
                        <div class="font-bold text-xl mb-2 line-clamp-2">DIGITAL MARKETING: FULLSTACK INTENSIVE BOOTCAMP</div>
                        <p class="text-gray-700 text-base">
                            <span id="date" class="block mb-1 text-sm">
                                <i class="fa-solid fa-calendar-days mr-2"></i> 21 - 25 March 2023
                            </span>
                            <span id="time" class="block mb-1 text-sm">
                                <i class="fa-solid fa-clock mr-2"></i> 09.00 - 17.00
                            </span>
                            <span id="price" class="block mb-1 text-sm">
                                <i class="fa-solid fa-tag mr-2"></i> Rp. 150000
                            </span>
                        </p>
                    </div>
                </a>
                <a href="bootcamp/detail/1" class="block bg-white rounded-xl overflow-hidden shadow-lg">
                    <img class="h-54 w-full object-cover" src="{{ asset('images/public.avif') }}" alt="Card Image">
                    <div class="p-4">
                        <div class="font-bold text-xl mb-2 line-clamp-2">DIGITAL MARKETING: FULLSTACK INTENSIVE BOOTCAMP</div>
                        <p class="text-gray-700 text-base">
                            <span id="date" class="block mb-1 text-sm">
                                <i class="fa-solid fa-calendar-days mr-2"></i> 21 - 25 March 2023
                            </span>
                            <span id="time" class="block mb-1 text-sm">
                                <i class="fa-solid fa-clock mr-2"></i> 09.00 - 17.00
                            </span>
                            <span id="price" class="block mb-1 text-sm">
                                <i class="fa-solid fa-tag mr-2"></i> Rp. 150000
                            </span>
                        </p>
                    </div>
                </a>
                <a href="bootcamp/detail/1" class="block bg-white rounded-xl overflow-hidden shadow-lg">
                    <img class="h-54 w-full object-cover" src="{{ asset('images/public.avif') }}" alt="Card Image">
                    <div class="p-4">
                        <div class="font-bold text-xl mb-2 line-clamp-2">DIGITAL MARKETING: FULLSTACK INTENSIVE BOOTCAMP</div>
                        <p class="text-gray-700 text-base">
                            <span id="date" class="block mb-1 text-sm">
                                <i class="fa-solid fa-calendar-days mr-2"></i> 21 - 25 March 2023
                            </span>
                            <span id="time" class="block mb-1 text-sm">
                                <i class="fa-solid fa-clock mr-2"></i> 09.00 - 17.00
                            </span>
                            <span id="price" class="block mb-1 text-sm">
                                <i class="fa-solid fa-tag mr-2"></i> Rp. 150000
                            </span>
                        </p>
                    </div>
                </a>
            </div>
        </section>
    </div>
@endsection

@push('js')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
    <script>
    var swiper = new Swiper('.swiper-container', {
        // Optional parameters
        loop: true,
        autoplay: {
            delay: 5000,
        },
    });
    </script>

@endpush


