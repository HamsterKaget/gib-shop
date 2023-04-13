@extends('user.layouts.app')

@section('title', 'My Page Title')

@push('css')
    <!-- Add Swiper JS and CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endpush

@section('content')
    <div class="container max-w-7xl mx-auto mt-8 w-full h-full">
        <div class="swiper mx-auto">
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

        <div class="features">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 justify-items-center gap-8">
                <div class="bg-slate-50 shadow-lg h-full max-w-64 p-4">
                    <div class="icon">
                        <img src="{{ asset('images/award.png') }}" class="max-h-48 m-auto">
                    </div>
                    <span class="block mt-2 text-bublegum-dark font-semibold text-lg">International Sertificates</span>
                </div>
                <div class="bg-slate-50 shadow-lg h-full max-w-64 p-4">
                    <div class="icon">
                        <img src="{{ asset('images/award.png') }}" class="max-h-48 m-auto">
                    </div>
                    <span class="block mt-2 text-bublegum-dark font-semibold text-lg">International Sertificates</span>
                </div>
                <div class="bg-slate-50 shadow-lg h-full max-w-64 p-4">
                    <div class="icon">
                        <img src="{{ asset('images/award.png') }}" class="max-h-48 m-auto">
                    </div>
                    <span class="block mt-2 text-bublegum-dark font-semibold text-lg">International Sertificates</span>
                </div>
                <div class="bg-slate-50 shadow-lg h-full max-w-64 p-4">
                    <div class="icon">
                        <img src="{{ asset('images/award.png') }}" class="max-h-48 m-auto">
                    </div>
                    <span class="block mt-2 text-bublegum-dark font-semibold text-lg">International Sertificates</span>
                </div>
            </div>
        </div>
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
