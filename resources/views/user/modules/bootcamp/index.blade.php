{{-- @extends('user.layouts.app')

@section('title', 'My Page Title')

@push('css')
@endpush

@section('content')
    <div class="mx-auto bg-bublegum mt-8 w-screen pb-28 rounded-b-[10%]">
        <section class="container max-w-7xl mx-auto w-full h-full hero flex flex-col-reverse md:flex-row items-center py-16 px-8">
            <div class="hero-text flex-1">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Join our Intensive Bootcamp with Industry Experts</h1>
                <p class="text-gray-800 text-lg mb-6">From understanding the fundamentals to mastering practical skills and tools, build dozens of portfolios and earn a certificate to jumpstart your dream career.</p>
                <button class="bg-bublegum-dark text-white py-2 px-6 rounded hover:brightness-90">Learn More</button>
            </div>
            <div class="hero-image flex-1 mb-8 md:mt-0">
                <img src="{{ asset('images/programmer.png') }}" alt="Hero Image" class="h-48 md:h-64 mx-auto">
            </div>
        </section>
    </div>

    <div class="container max-w-7xl mx-auto mt-8 w-full h-full pb-10">

        <div class="features md:-mt-36">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 justify-items-center gap-8">
                <div class="bg-slate-50 shadow-lg h-full max-w-64 p-4 rounded-xl">
                    <div class="icon">
                        <img src="{{ asset('images/award.png') }}" class="max-h-48 m-auto">
                    </div>
                    <span class="block mt-2 text-bublegum-dark font-semibold text-lg">International Sertificates</span>
                </div>
                <div class="bg-slate-50 shadow-lg h-full max-w-64 p-4 rounded-xl">
                    <div class="icon">
                        <img src="{{ asset('images/award.png') }}" class="max-h-48 m-auto">
                    </div>
                    <span class="block mt-2 text-bublegum-dark font-semibold text-lg">International Sertificates</span>
                </div>
                <div class="bg-slate-50 shadow-lg h-full max-w-64 p-4 rounded-xl">
                    <div class="icon">
                        <img src="{{ asset('images/award.png') }}" class="max-h-48 m-auto">
                    </div>
                    <span class="block mt-2 text-bublegum-dark font-semibold text-lg">International Sertificates</span>
                </div>
                <div class="bg-slate-50 shadow-lg h-full max-w-64 p-4 rounded-xl">
                    <div class="icon">
                        <img src="{{ asset('images/award.png') }}" class="max-h-48 m-auto">
                    </div>
                    <span class="block mt-2 text-bublegum-dark font-semibold text-lg">International Sertificates</span>
                </div>
            </div>
        </div>

        <div class="content mt-10">
            <div class="flex w-3/4 mx-auto">
                <input type="text" placeholder="Search Bootcamp" class="border rounded-l py-2 px-3 w-full">
                <button class="bg-bublegum-dark brightness-105 hover:brightness-90 text-white font-bold py-2 px-4 rounded-r">Search</button>
            </div>
        </div>

        <section class="bootcamp mt-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white rounded-xl overflow-hidden shadow-lg">
                    <img class="h-54 w-full object-cover" src="{{ asset('images/public.avif') }}" alt="Card Image">
                    <div class="p-4">
                        <div class="font-bold text-xl mb-2 line-clamp-2">DIGITAL MARKETING: FULLSTACK INTENSIVE BOOTCAMP</div>
                        <p class="text-gray-700 text-base">
                            <span id="date" class="block mb-1">
                                <i class="fa-solid fa-calendar-days mr-2"></i> 21 - 25 March 2023
                            </span>
                            <span id="time" class="block mb-1">
                                <i class="fa-solid fa-clock mr-2"></i> 09.00 - 17.00
                            </span>
                            <span id="price" class="block mb-1">
                                <i class="fa-solid fa-tag mr-2"></i> Rp150.000
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
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

@endpush --}}

{{-- @extends('user.layouts.app')

@section('title', 'My Page Title')

@push('css')
    <!-- Add Swiper JS and CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endpush

@section('content')
    <div class="container max-w-7xl mx-auto  w-full h-full">

    </div>
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

@endpush --}}

@extends('user.layouts.app')

@section('title', 'My Page Title')

@push('css')
    <!-- Add Swiper JS and CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

@endpush

@section('content')
    <div class="container max-w-7xl mx-auto lg:-mt-4  w-full h-full">
        <div class="swiper mx-auto" data-aos="fade-up">
            <div class="swiper-container" style="height: 400px; margin: 5% 0px;">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="mx-auto rounded-lg" src="{{ asset('images/Banner Event/1.png') }}" alt="Slide 1">
                    </div>
                    <div class="swiper-slide">
                        <img class="mx-auto rounded-lg" src="{{ asset('images/Banner Event/2.png') }}" alt="Slide 1">
                    </div>
                    <div class="swiper-slide">
                        <img class="mx-auto rounded-lg" src="{{ asset('images/Banner Event/3.png') }}" alt="Slide 1">
                    </div>
                    <div class="swiper-slide">
                        <img class="mx-auto rounded-lg" src="{{ asset('images/Banner Event/4.png') }}" alt="Slide 1">
                    </div>
                    <div class="swiper-slide">
                        <img class="mx-auto rounded-lg" src="{{ asset('images/Banner Event/5.png') }}" alt="Slide 1">
                    </div>
                    <div class="swiper-slide">
                        <img class="mx-auto rounded-lg" src="{{ asset('images/Banner Event/6.png') }}" alt="Slide 1">
                    </div>
                    <div class="swiper-slide">
                        <img class="mx-auto rounded-lg" src="{{ asset('images/Banner Event/7.png') }}" alt="Slide 1">
                    </div>
                    <div class="swiper-slide">
                        <img class="mx-auto rounded-lg" src="{{ asset('images/Banner Event/8.png') }}" alt="Slide 1">
                    </div>
                    <div class="swiper-slide">
                        <img class="mx-auto rounded-lg" src="{{ asset('images/Banner Event/9.png') }}" alt="Slide 1">
                    </div>
                    <div class="swiper-slide">
                        <img class="mx-auto rounded-lg" src="{{ asset('images/Banner Event/10.png') }}" alt="Slide 1">
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="w-full h-full flex items-center mt-8">
            <div class="flex justify-center w-full mx-auto">
                <input class="w-[90%] border border-gray-100 focus:outline-none focus:border-indigo-700 rounded-md shadow-lg text-sm text-gray-500 placeholder-gray-600 bg-white pl-8 py-2" type="text" placeholder="Search" />
            </div>
        </div> --}}

        <section id="bootcamp" class="p-8 pt-0 -mt-6">
            <div class="container max-w-7xl mx-auto w-full h-full py-4 my-4">
                <h2 data-aos="fade-up" data-aos-delay="0" class="text-2xl font-bold text-center text-neutral-500 mb-3">
                    Main Events
                </h2>
                <hr data-aos="fade-up" data-aos-delay="50">
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($main as $index => $program)
                        @php
                            $startDate = \Carbon\Carbon::parse($program->start_date);
                            $isPastDate = $startDate->isPast();
                            $delay = ($index % 4) * 200; // Calculate the delay based on the current index
                        @endphp
                        <a href="{{ $isPastDate ? '#' : 'events/detail/'.$program->slug }}" class="block bg-white rounded-xl overflow-hidden shadow-lg{{ $isPastDate ? ' grayscale' : '' }}" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                                {{-- <div class="relative"> --}}
                                    <img class="h-54 w-full object-cover" src="{{ asset($program->thumbnail) }}" alt="Card Image">
                                    <div class="p-4">
                                        <div class="font-bold text-xl mb-2 line-clamp-2 {{ $isPastDate ? 'text-slate-400' : ''}}">{{ $program->title }}</div>
                                        <p class="{{ $isPastDate ? 'text-slate-400' : 'text-gray-700' }} text-base">
                                            <span id="date" class="block mb-1 text-sm">
                                                <i class="fa-solid fa-calendar-days mr-2"></i> {{ date_format(date_create($program->start_date),"D, d M Y") }}
                                            </span>
                                            <span id="time" class="block mb-1 text-sm">
                                                <i class="fa-solid fa-clock mr-2"></i> {{ $program->time }}
                                            </span>
                                            <span id="price" class="block mb-1 text-sm">
                                                <i class="fa-solid fa-tag mr-2"></i>
                                                @if ($program->price == 0)
                                                    Free
                                                @else
                                                    Rp. {{ number_format($program->price) }} / $ {{ number_format(($program->price / 15000)) }}
                                                @endif
                                            </span>

                                        </p>
                                    </div>
                                    @if ($isPastDate)
                                        <span class="text-center uppercase transform inline-block py-1 w-full text-sm font-semibold text-red-100 bg-red-500 rounded mt-2.5">{{ __('Closed') }}</span>
                                    @endif
                                {{-- </div> --}}
                            </a>
                    @endforeach
                </div>
            </div>
            <div class="container max-w-7xl mx-auto w-full h-full py-4 my-4">
                <h2 data-aos="fade-up" data-aos-delay="0" class="text-2xl font-bold text-center text-neutral-500 mb-3">
                    Mini Events
                </h2>
                <hr data-aos="fade-up" data-aos-delay="50">
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($mini as $index => $program)
                        @php
                            $startDate = \Carbon\Carbon::parse($program->start_date);
                            $isPastDate = $startDate->isPast();
                            $delay = ($index % 4) * 200; // Calculate the delay based on the current index
                        @endphp
                        <a href="{{ $isPastDate ? '#' : 'events/detail/'.$program->slug }}" class="block bg-white rounded-xl overflow-hidden shadow-lg{{ $isPastDate ? ' grayscale' : '' }}" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                                {{-- <div class="relative"> --}}
                                    <img class="h-54 w-full object-cover" src="{{ asset($program->thumbnail) }}" alt="Card Image">
                                    <div class="p-4">
                                        <div class="font-bold text-xl mb-2 line-clamp-2 {{ $isPastDate ? 'text-slate-400' : ''}}">{{ $program->title }}</div>
                                        <p class="{{ $isPastDate ? 'text-slate-400' : 'text-gray-700' }} text-base">
                                            <span id="date" class="block mb-1 text-sm">
                                                <i class="fa-solid fa-calendar-days mr-2"></i> {{ date_format(date_create($program->start_date),"D, d M Y") }}
                                            </span>
                                            <span id="time" class="block mb-1 text-sm">
                                                <i class="fa-solid fa-clock mr-2"></i> {{ $program->time }}
                                            </span>
                                            <span id="price" class="block mb-1 text-sm">
                                                <i class="fa-solid fa-tag mr-2"></i>
                                                @if ($program->price == 0)
                                                    Free
                                                @else
                                                    Rp. {{ number_format($program->price) }} / $ {{ number_format(($program->price / 15000)) }}
                                                @endif
                                            </span>

                                        </p>
                                    </div>
                                    @if ($isPastDate)
                                        <span class="text-center uppercase transform inline-block py-1 w-full text-sm font-semibold text-red-100 bg-red-500 rounded mt-2.5">{{ __('Closed') }}</span>
                                    @endif
                                {{-- </div> --}}
                            </a>
                    @endforeach
                </div>
            </div>
            <div class="container max-w-7xl mx-auto w-full h-full py-4 my-4">
                <h2 data-aos="fade-up" data-aos-delay="0" class="text-2xl font-bold text-center text-neutral-500 mb-3">
                    Free Events
                </h2>
                <hr data-aos="fade-up" data-aos-delay="50">
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($free as $index => $program)
                        @php
                            $startDate = \Carbon\Carbon::parse($program->start_date);
                            $isPastDate = $startDate->isPast();
                            $delay = ($index % 4) * 200; // Calculate the delay based on the current index
                        @endphp
                        <a href="{{ $isPastDate ? '#' : 'events/detail/'.$program->slug }}" class="block bg-white rounded-xl overflow-hidden shadow-lg{{ $isPastDate ? ' grayscale' : '' }}" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                                {{-- <div class="relative"> --}}
                                    <img class="h-54 w-full object-cover" src="{{ asset($program->thumbnail) }}" alt="Card Image">
                                    <div class="p-4">
                                        <div class="font-bold text-xl mb-2 line-clamp-2 {{ $isPastDate ? 'text-slate-400' : ''}}">{{ $program->title }}</div>
                                        <p class="{{ $isPastDate ? 'text-slate-400' : 'text-gray-700' }} text-base">
                                            <span id="date" class="block mb-1 text-sm">
                                                <i class="fa-solid fa-calendar-days mr-2"></i> {{ date_format(date_create($program->start_date),"D, d M Y") }}
                                            </span>
                                            <span id="time" class="block mb-1 text-sm">
                                                <i class="fa-solid fa-clock mr-2"></i> {{ $program->time }}
                                            </span>
                                            <span id="price" class="block mb-1 text-sm">
                                                <i class="fa-solid fa-tag mr-2"></i>
                                                @if ($program->price == 0)
                                                    Free
                                                @else
                                                    Rp. {{ number_format($program->price) }} / $ {{ number_format(($program->price / 15000)) }}
                                                @endif
                                            </span>

                                        </p>
                                    </div>
                                    @if ($isPastDate)
                                        <span class="text-center uppercase transform inline-block py-1 w-full text-sm font-semibold text-red-100 bg-red-500 rounded mt-2.5">{{ __('Closed') }}</span>
                                    @endif
                                {{-- </div> --}}
                            </a>
                    @endforeach

                </div>
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


