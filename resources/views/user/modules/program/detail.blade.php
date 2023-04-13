@extends('user.layouts.app')

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

@endpush
