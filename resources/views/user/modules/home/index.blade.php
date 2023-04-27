@extends('user.layouts.app')

@section('title', 'My Page Title')

@push('css')
    <!-- Add Swiper JS and CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endpush

@section('content')
    <section id="hero" class="bg-indigo-50 p-8">
        <div class="container max-w-7xl mx-auto w-full h-full">
            <div class="grid grid-cols-7 items-center gap-3">
                <div class="col-span-7 md:col-span-4">
                    <h1 class="font-bold text-2xl md:text-3xl mb-4 md:mr-8">Join Us and Boost Your Skills with Our Professional Bootcamps and Programs</h1>
                    <p class="mb-6 md:mr-8">Unlock your potential with our expert-led programs and bootcamps! From digital marketing to cybersecurity, we offer a wide range of courses to help you enhance your skills and take your career to the next level. <br><br>Join us today and let's start your learning journey together!</p>
                    <a href="#" class="mt-6 py-2 px-4 bg-indigo-500 text-white rounded-md shadow-lg">Register Free Account !</a>
                </div>
                <div class="col-span-7 md:col-span-3 hidden md:block">
                    <img src="/images/hero.jpg" alt="hero" class="h-auto brightness-75 rounded-lg shadow-md">
                </div>
            </div>
        </div>
    </section>

    <section id="feature" class="p-8">
        <div class="container max-w-7xl mx-auto w-full h-full">
            {{-- <h2 class="text-2xl text-center my-6 font-bold uppercase">
                Milestone
            </h2> --}}
            <div class="flex flex-col -mt-4">
                {{-- <h2 class="mb-4 text-2xl lg:text-3xl font-bold text-center">Featuring</h2> --}}
                <div class="mt-4 grid grid-cols-1  gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                {{-- <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                    </div>

                    <div class="ml-4">
                    <h2 class="font-semibold">1200</h2>
                    <p class="mt-2 text-sm text-gray-500"></p>
                    </div>
                </div> --}}

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
                        {{-- <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> --}}
                            {{-- <path  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /> --}}
                            {{-- <path stroke-linecap="round" stroke-linejoin="round" d="M9.5 18.75a1.5 1.5 0 00-1.5 1.5v1a1.5 1.5 0 001.5 1.5h5a1.5 1.5 0 001.5-1.5v-1a1.5 1.5 0 00-1.5-1.5h-1.25v-.75h1.25a.75.75 0 010 1.5h.75v-.75h.5v.75h.75v-.75h.5v.75h.75v-.75h.5v.75h.75v-.75h.5v.75h.75v-.75h.5v.75h.75v-.75H21a1.5 1.5 0 001.5-1.5v-1a1.5 1.5 0 00-1.5-1.5h-4.25l1.39-2.779a1.5 1.5 0 00-1.345-2.121H9.255a1.5 1.5 0 00-1.345 2.121L9.25 14h-3a1.5 1.5 0 00-1.5 1.5v1a1.5 1.5 0 001.5 1.5h3zm.5-7.5a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm5 0a1.5 1.5 0 110-3 1.5 1.5 0 010 3z"/> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 5V4C6 2.34315 7.34315 1 9 1H15C16.6569 1 18 2.34315 18 4V5H20C21.6569 5 23 6.34315 23 8V20C23 21.6569 21.6569 23 20 23H4C2.34315 23 1 21.6569 1 20V8C1 6.34315 2.34315 5 4 5H6ZM8 4C8 3.44772 8.44772 3 9 3H15C15.5523 3 16 3.44772 16 4V5H8V4ZM19.882 7H4.11803L6.34164 11.4472C6.51103 11.786 6.8573 12 7.23607 12H11C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12H16.7639C17.1427 12 17.489 11.786 17.6584 11.4472L19.882 7ZM11 14H7.23607C6.09975 14 5.06096 13.358 4.55279 12.3416L3 9.23607V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V9.23607L19.4472 12.3416C18.939 13.358 17.9002 14 16.7639 14H13C13 14.5523 12.5523 15 12 15C11.4477 15 11 14.5523 11 14Z"/>
                                </svg>
                        {{-- </svg> --}}
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
            </div>
        </div>
    </section>

    {{-- <section class="bootcamp my-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($programs as $program)
                <a href="events/detail/{{ $program->id }}" class="block bg-white rounded-xl overflow-hidden shadow-lg">
                    <img class="h-54 w-full object-cover" src="{{ asset($program->thumbnail) }}" alt="Card Image">
                    <div class="p-4">
                        <div class="font-bold text-xl mb-2 line-clamp-2">{{ $program->title }}</div>
                        <p class="text-gray-700 text-base">
                            <span id="date" class="block mb-1 text-sm">
                                <i class="fa-solid fa-calendar-days mr-2"></i> {{ date_format(date_create($program->start_date),"D, d M Y"); }}
                            </span>
                            <span id="time" class="block mb-1 text-sm">
                                <i class="fa-solid fa-clock mr-2"></i> {{ $program->time }}
                            </span>
                            <span id="price" class="block mb-1 text-sm">
                                <i class="fa-solid fa-tag mr-2"></i> Rp. {{ number_format($program->price)}}
                            </span>
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </section> --}}

    <section id="bootcamp" class="p-8">
        <div class="container max-w-7xl mx-auto w-full h-full">
            <h2 class="text-2xl font-bold text-center text-neutral-500 mb-3">
                Newest Events
            </h2>
            <hr>
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($programs as $program)
                    <a href="events/detail/{{ $program->id }}" class="block bg-white rounded-xl overflow-hidden shadow-lg">
                        <img class="h-54 w-full object-cover" src="{{ asset($program->thumbnail) }}" alt="Card Image">
                        <div class="p-4">
                            <div class="font-bold text-xl mb-2 line-clamp-2">{{ $program->title }}</div>
                            <p class="text-gray-700 text-base">
                                <span id="date" class="block mb-1 text-sm">
                                    <i class="fa-solid fa-calendar-days mr-2"></i> {{ date_format(date_create($program->start_date),"D, d M Y"); }}
                                </span>
                                <span id="time" class="block mb-1 text-sm">
                                    <i class="fa-solid fa-clock mr-2"></i> {{ $program->time }}
                                </span>
                                <span id="price" class="block mb-1 text-sm">
                                    <i class="fa-solid fa-tag mr-2"></i> Rp. {{ number_format($program->price)}}
                                </span>
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- <section id="mini-event" class="p-8">
        <div class="container max-w-7xl mx-auto w-full h-full">
            <h2 class="text-2xl font-bold text-center text-neutral-500 mb-3">
                Newest Mini Event
            </h2>
            <hr>
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="bootcamp/detail/1" class="block bg-white rounded-xl overflow-hidden shadow-lg">
                    <img class="h-54 w-full object-cover" src="{{ asset('images/Thumbnail.png') }}" alt="Card Image">
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
                    <img class="h-54 w-full object-cover" src="{{ asset('images/Thumbnail.png') }}" alt="Card Image">
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
                    <img class="h-54 w-full object-cover" src="{{ asset('images/Thumbnail.png') }}" alt="Card Image">
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
                    <img class="h-54 w-full object-cover" src="{{ asset('images/Thumbnail.png') }}" alt="Card Image">
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
        </div>
    </section> --}}

    {{-- <section id="testimoni" class="p-8">
        <div class="container max-w-7xl mx-auto w-full h-full">
            <h2 class="text-2xl font-bold text-center text-neutral-500 mb-5">
                Testimoni
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4   ">
                <div class="p-4 bg-white shadow-lg rounded-md flex flex-col items-center">
                    <div class="my-2 w-24 h-24 rounded-full overflow-hidden flex items-center justify-center">
                        <img src="/images/testi.jpg" alt="" class="w-full h-full object-cover">
                    </div>
                    <div class="text-center">
                        <h5 class="text-lg font-bold text-slate-800 mt-3 -mb-1">Jhon Doe</h5>
                    </div>
                    <div class="text-center p-2">
                        <p>
                            "I am so grateful that I decided to join this bootcamp. I learned so much about digital marketing and security, and was able to implement what I learned right away."
                        </p>
                        <br>
                        <span class="text-neutral-500 font-bold text-[10px] uppercase">Project Manager - PT Indonusa Jaya Abadi</span>
                    </div>
                </div>
                <div class="p-4 bg-white shadow-lg rounded-md flex flex-col items-center">
                    <div class="my-2 w-24 h-24 rounded-full overflow-hidden flex items-center justify-center">
                        <img src="/images/testi.jpg" alt="" class="w-full h-full object-cover">
                    </div>
                    <div class="text-center">
                        <h5 class="text-lg font-bold text-slate-800 mt-3 -mb-1">Jhon Doe</h5>
                    </div>
                    <div class="text-center p-2">
                        <p>
                            "I am so grateful that I decided to join this bootcamp. I learned so much about digital marketing and security, and was able to implement what I learned right away."
                        </p>
                        <br>
                        <span class="text-neutral-500 font-bold text-[10px] uppercase">Project Manager - PT Indonusa Jaya Abadi</span>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section id="faq" class="p-8">
        <div class="container max-w-7xl mx-auto w-full h-full">
            <div class="flex flex-col items-center">
                <h2 class="font-bold text-5xl mt-5 tracking-tight">
                    FAQ
                </h2>
                <p class="text-neutral-500 text-xl mt-3">
                    Frequenty asked questions
                </p>
            </div>
            <div class="grid divide-y divide-neutral-200 max-w-xl mx-auto mt-8">
                <div class="py-5">
                    <details class="group">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                            <span> What is a SAAS platform?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                            </span>
                        </summary>
                        <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                            SAAS platform is a cloud-based software service that allows users to access
                            and use a variety of tools and functionality.
                        </p>
                    </details>
                </div>
                <div class="py-5">
                    <details class="group">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                            <span> How do we compare to other similar services?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                            </span>
                        </summary>
                        <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                            This platform is a highly reliable and feature-rich service that offers a wide range
                            of tools and functionality. It is competitively priced and offers a variety of billing options to
                            suit different needs and budgets.
                        </p>
                    </details>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
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
