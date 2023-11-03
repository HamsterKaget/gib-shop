@extends('user.layouts.app')

@section('title', 'Gathering In Bali')

@push('css')
    <!-- Add Swiper JS and CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

@endpush

@section('content')
    {{-- <section id="hero" class="bg-indigo-50 p-8">
        <div class="container max-w-7xl mx-auto w-full h-full">
            <div class="grid grid-cols-7 items-center gap-3">
                <div class="col-span-7 md:col-span-4" data-aos="fade-right" data-aos-delay="0">
                    <h1 class="font-bold text-2xl md:text-3xl mb-4 md:mr-8">Transform Your Skills, Transform Your Future:<br/>Register Today for our Skill-Boosting Program!</h1>
                    <p class="mb-6 md:mr-8">Transforming your skills is the key to unlocking a world of new possibilities. Take charge of your future by enrolling in our skill-boosting program and let us guide you toward a pathway of growth and success.
                        <br><br>This is your ticket to unlocking your full potential and shaping a brighter future.</p>
                    <a href="#" class="mt-6 py-2 px-4 bg-indigo-500 text-white rounded-md shadow-lg">Register Free Account !</a>
                </div>
                <div class="col-span-7 md:col-span-3 hidden md:block" data-aos="fade-left" data-aos-delay="0">
                    <img src="/images/hero.jpg" alt="hero" class="h-auto brightness-75 rounded-lg shadow-md">
                </div>
            </div>
        </div>
    </section> --}}

    <section class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')] py-20 sm:py-12 md:py-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 container mx-auto ">
            <div class="sm:px-16">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:text-left text-center lg:py-16 z-10 relative">
                    <a href="#" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-blue-700 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
                        <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 mr-3">Promo</span> <span class="text-sm font-medium">Dive into our exclusive discount up to 40% for the upcoming event!</span>
                        <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </a>
                    <h1 class="mb-0.5 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-5xl dark:text-white">Transform Your <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Skills</span></h1>
                    <h1 class="mb-2 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-5xl dark:text-white">Transform Your <span class="underline underline-offset-3 decoration-8 decoration-amber-400 dark:decoration-amber-600">Future</span></h1>
                    <p class="mb-3 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-200">
                        Transforming your skills is the key to unlocking a world of new possibilities. Take charge of your future by enrolling in our skill-boosting program and let us guide you toward a pathway of growth and success.
                        <br><br>This is your ticket to unlocking your full potential and shaping a brighter future.
                    </p>
                    <button
                        data-modal-target="register-modal"
                        data-modal-toggle="register-modal"
                        class="text-white px-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register Now !</button>
                </div>
                {{-- <div class="bg-gradient-to-b from-blue-50 to-transparent dark:from-blue-900 w-full h-full absolute top-0 left-0 z-0"></div> --}}
            </div>
            <div class="flex justify-center items-center order-first lg:order-last">
                <img class="h-auto lg:max-w-lg max-w-md w-52 sm:w-full rounded-lg rotate-3 brightness-75 shadow-md" src="{{ asset('images/hero.jpg') }}" alt="image description">
            </div>
        </div>

    </section>

    <section class="p-8 bg-white">
        <div class="container mx-auto w-full h-full py-4 my-4">
            <h2 data-aos="fade-up" data-aos-delay="0" class="text-2xl font-bold text-center text-neutral-500 mb-3">
                Main Events
            </h2>
            <hr data-aos="fade-up" data-aos-delay="50">
            <div class="mt-6 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-2 md:gap-4">
                @foreach ($main as $index => $program)
                    @php
                        $startDate = \Carbon\Carbon::parse($program->start_date);
                        $isPastDate = $startDate->isPast();
                        $price = $program->price;

                        if (isset($program->Discount[0])) {
                            $discountedPrice = $program->Discount[0]->discount; // Initialize with the original price
                            $discountPercentage = $program->Discount[0]->percent; // Initialize with the original price
                        //     // dd($program->Discount);
                        //     $discountPercentage = $program->Discount[0]->discount; // Assuming you have the discount percentage
                        //     if ($discountPercentage) {
                        //         // Ensure the discount percentage is between 0 and 1 (e.g., 0.1 for 10%)
                        //         // dd('ada');
                        //         $discountedPrice = $price - ($price * ($discountPercentage / 100));
                        //     }
                        }


                        $delay = ($index % 5) * 200; // Calculate the delay based on the current index
                    @endphp
                    <a href="{{ $isPastDate ? '#' : 'events/detail/'.$program->slug }}" class="block bg-white rounded-xl overflow-hidden shadow-lg{{ $isPastDate ? ' grayscale' : '' }}" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                            {{-- <div class="relative"> --}}
                                {{-- <img class="h-54 w-full object-cover" src="{{ asset($program->thumbnail) }}" alt="Card Image"> --}}
                                <img class="h-54 w-full object-cover" src="{{ strpos($program->thumbnail, 'images/Thumbnail') === 0 ? asset($program->thumbnail) : Storage::url($program->thumbnail) }}" alt="Card Image">
                                <div class="p-4">
                                    <div class="font-medium text-xl mb-2 line-clamp-2 {{ $isPastDate ? 'text-slate-400' : ''}}">{{ $program->title }}</div>
                                    <p id="price" class="block mb-1 text-sm font-bold">
                                        <i class="fa-solid fa-tag mr-1"></i>
                                        @if ($program->price == 0)
                                            Free
                                        @else
                                            @if (isset($program->Discount[0]))
                                                <span class="font-bold text-base">
                                                    Rp. {{ number_format($program->price - $discountedPrice) }} / $ {{ number_format((($program->price - $discountedPrice) / 15000)) }}
                                                </span>
                                                <span class="flex justify-start items-center">
                                                    <span class="text-slate-400 line-through block text-xs">
                                                        Rp. {{ number_format($program->price) }} / $ {{ number_format(($program->price / 15000)) }}
                                                    </span>
                                                    </span>
                                                    <span class="bg-red-100 mt-1 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-red-700 dark:text-red-400 border border-gray-500">
                                                        {{-- <i class="fa-solid fa-tags"></i> --}}
                                                        <svg class="w-3 h-3 my-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M18.435 7.546A2.32 2.32 0 0 1 17.7 5.77a3.354 3.354 0 0 0-3.47-3.47 2.322 2.322 0 0 1-1.776-.736 3.357 3.357 0 0 0-4.907 0 2.281 2.281 0 0 1-1.776.736 3.414 3.414 0 0 0-2.489.981 3.372 3.372 0 0 0-.982 2.49 2.319 2.319 0 0 1-.736 1.775 3.36 3.36 0 0 0 0 4.908A2.317 2.317 0 0 1 2.3 14.23a3.356 3.356 0 0 0 3.47 3.47 2.318 2.318 0 0 1 1.777.737 3.36 3.36 0 0 0 4.907 0 2.36 2.36 0 0 1 1.776-.737 3.356 3.356 0 0 0 3.469-3.47 2.319 2.319 0 0 1 .736-1.775 3.359 3.359 0 0 0 0-4.908ZM8.5 5.5a1 1 0 1 1 0 2 1 1 0 0 1 0-2Zm3 9.063a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm2.207-6.856-6 6a1 1 0 0 1-1.414-1.414l6-6a1 1 0 0 1 1.414 1.414Z"/>
                                                        </svg>
                                                        <span class="ml-0.5">
                                                            Discount {{ number_format($discountPercentage) }}%
                                                        </span>
                                                    </span>
                                            @else
                                                <span class="font-bold text-base">
                                                    Rp. {{ number_format($price) }} / $ {{ number_format(($price / 15000)) }}
                                                </span>
                                                {{-- <span class="flex justify-start items-center">
                                                    <span class="text-slate-400 line-through block text-xs">
                                                        Rp. {{ number_format($program->price) }} / $ {{ number_format(($program->price / 15000)) }}
                                                    </span>
                                                    <span class="text-red-600 p-1 ml-2 text-[10px] bg-red-100 flex items-center rounded-full">
                                                        <svg class="w-2 h-2 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M18.435 7.546A2.32 2.32 0 0 1 17.7 5.77a3.354 3.354 0 0 0-3.47-3.47 2.322 2.322 0 0 1-1.776-.736 3.357 3.357 0 0 0-4.907 0 2.281 2.281 0 0 1-1.776.736 3.414 3.414 0 0 0-2.489.981 3.372 3.372 0 0 0-.982 2.49 2.319 2.319 0 0 1-.736 1.775 3.36 3.36 0 0 0 0 4.908A2.317 2.317 0 0 1 2.3 14.23a3.356 3.356 0 0 0 3.47 3.47 2.318 2.318 0 0 1 1.777.737 3.36 3.36 0 0 0 4.907 0 2.36 2.36 0 0 1 1.776-.737 3.356 3.356 0 0 0 3.469-3.47 2.319 2.319 0 0 1 .736-1.775 3.359 3.359 0 0 0 0-4.908ZM8.5 5.5a1 1 0 1 1 0 2 1 1 0 0 1 0-2Zm3 9.063a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm2.207-6.856-6 6a1 1 0 0 1-1.414-1.414l6-6a1 1 0 0 1 1.414 1.414Z"/>
                                                        </svg>
                                                        40%
                                                    </span>
                                                </span> --}}
                                            @endif
                                        @endif
                                    </p>
                                    <p class="{{ $isPastDate ? 'text-slate-400' : 'text-gray-700' }} text-base">
                                        {{-- <span class="flex space-x-1"> --}}
                                            <span id="date" class="block mb-1 text-sm">
                                                <i class="fa-solid fa-calendar-days mr-1"></i> {{ date_format(date_create($program->start_date),"d M Y") }}
                                            </span>
                                            <span id="time" class="block mb-1 text-sm">
                                                <i class="fa-solid fa-clock mr-1"></i> {{ $program->time }}
                                            </span>
                                            {{-- <span id="time" class="flex mb-1 text-sm">
                                                <svg class="w-4 h-4 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 19 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm1-4H5m0 0L3 4m0 0h5.501M3 4l-.792-3H1m11 3h6m-3 3V1"/>
                                                  </svg>
                                                  15 Sold
                                            </span> --}}
                                        {{-- </span> --}}
                                    </p>
                                </div>
                                {{-- @if ($isPastDate) --}}
                                {{-- @endif --}}
                            {{-- </div> --}}
                        </a>
                @endforeach
            </div>
        </div>
    </section>
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
