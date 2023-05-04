@extends('user.layouts.app')

@push('css')
<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>
<style>

</style>
@endpush

{{-- @dd($program) --}}
@section('content')
    <div class="min-h-screen mx-auto max-w-screen h-full">
        <div class="grid grid-cols-1">
            <div class="bg-sky-100 py-8">
                <div class="md:flex max-w-[90vw] mx-auto">
                    <div class="mx-2 md:mx-4 lg:mx-8 md:w-4/10">
                        <div class="swiper mySwiper2" style="max-width: 500px;">
                            <div class="swiper-wrapper">
                                @if($program->thumbnail)
                                <div class="swiper-slide">
                                    <img class="max-h-96 rounded-lg mx-auto" src="{{ asset($program->thumbnail) }}" alt="{{ $program->title }}">
                                </div>
                                @endif
                                @if ($program->Image->isNotEmpty())
                                    @foreach($program->Image as $image)
                                    <div class="swiper-slide">
                                        <img class="max-h-96 rounded-lg mx-auto" src="{{ asset($image->image) }}" alt="{{ $program->title }}">
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper" style="max-width: 500px; margin-top: 15px;">
                            <div class="swiper-wrapper">
                                @if($program->thumbnail)
                                <div class="swiper-slide">
                                    <img class="max-h-24 rounded-lg" src="{{ asset($program->thumbnail) }}" alt="{{ $program->title }}">
                                </div>
                                @endif
                                @if ($program->Image->isNotEmpty())
                                @foreach($program->Image as $image)
                                <div class="swiper-slide">
                                    <img class="max-h-24 rounded-lg" src="{{ asset($image->image) }}" alt="{{ $program->title }}">
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        {{-- <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @if($program->thumbnail)
                                <div class="swiper-slide">
                                    <img class="max-h-96 rounded-lg" src="{{ asset($program->thumbnail) }}" alt="{{ $program->title }}">
                                </div>
                                @endif
                                @if ($program->Image->isNotEmpty())
                                @foreach($program->Image as $image)
                                <div class="swiper-slide">
                                    <img class="max-h-96 rounded-lg" src="{{ asset($image->image) }}" alt="{{ $program->title }}">
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="swiper-pagination"></div>
                        </div> --}}
                    </div>
                    <div class="mt-4 mx-2 md:mt-0">
                        <h1 class="text-2xl md:text-3xl font-bold">{{ $program->title }}</h1>
                        <div class="mt-4 md:mt-8 w-full md:w-8/12 rounded-lg bg-slate-50 shadow-lg p-4">
                            <h5 class="font-bold text-lg mb-2">Detail Information</h5>
                            <p><i class="fa-solid fa-cube m-1"></i> Stock : {{ $program->stock }}</p>
                            <p class="mt-1"><i class="fa-solid fa-calendar m-1"></i> Start Date : {{date_format(date_create($program->start_date),"D, d M Y"); }}</p>
                            <p class="mt-1"><i class="fa-solid fa-calendar m-1"></i> End Date : {{date_format(date_create($program->end_date),"D, d M Y"); }}</p>
                            <p class="mt-1"><i class="fa-solid fa-clock m-1"></i> Time : {{ $program->time }}</p>
                            <p class="mt-1"><i class="fa-solid fa-tags m-1"></i> Price : Rp {{ number_format($program->price) }}</p>
                        </div>

                            {{-- <button class="bg-indigo-500 hover:bg-indigo-600 text-slate-50 font-bold py-3 px-4 mt-4 shadow-lg rounded-lg">Join Bootcamp Now !</button> --}}
                    </div>
                </div>
            </div>
            <div class="py-4 mb-12">
                <div class="md:flex max-w-[90vw] mx-auto">
                    <div class="mx-2 md:mx-4 lg:mx-8 w-4/12">
                        @if ($program->Option->isNotEmpty())
                            <div class="mt-4 md:mt-8 w-full rounded-lg bg-slate-50 shadow-lg p-4">
                                <h5 class="font-bold text-lg mb-2 text-center uppercase">Choose Variant</h5>
                                <hr>
                                <div class="my-4"></div>
                                <form action="{{ route('cart.add', $program->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="program_id" value="{{ $program->id }}">
                                    @foreach ($program->Option as $option)
                                        <label for="option_value_id_{{ $option->id }}" class="block my-2 mx-2 text-sm font-medium text-gray-900">
                                            {{ $option->options }}
                                        </label>
                                        <input type="hidden" name="options[{{ $option->id }}][id]" value="{{ $option->id }}">
                                        <select required name="options[{{ $option->id }}][value_id]" id="option_value_id_{{ $option->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5s">
                                            <option value="" selected>Choose an option</option>
                                            @if ($option->Value->isNotEmpty())
                                                @foreach ($option->Value as $value)
                                                    <option value="{{ $value->id }}">{{ $value->value }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    @endforeach
                                    @guest
                                        <a href="{{ route('login') }}" class="block text-center bg-emerald-500 hover:bg-emerald-600 hover:-translate-y-1 transition-all duration-300 text-slate-50 py-2 px-3 w-full mt-4 shadow-lg rounded-lg">Login to Continue</a>
                                    @endguest
                                    @auth
                                        <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 hover:-translate-y-1 transition-all duration-300 text-slate-50 py-2 px-3 w-full mt-4 shadow-lg rounded-lg"><i class="fa-solid fa-cart-shopping"></i>+</button>
                                    @endauth
                                </form>
                            </div>
                        @else
                            <div class="mt-4 md:mt-8 w-full rounded-lg bg-slate-50 shadow-lg p-4">
                                <h5 class="font-bold text-lg mb-2 text-center uppercase">Product Options</h5>
                                <hr>
                                <div class="my-4"></div>
                                <form action="{{ route('cart.add', $program->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="program_id" value="{{ $program->id }}">
                                    @foreach ($program->Option as $option)
                                        <label for="option_value_id_{{ $option->id }}" class="block my-2 mx-2 text-sm font-medium text-gray-900">
                                            Select an {{ $option->name }}
                                        </label>
                                        <input type="hidden" name="options[{{ $option->id }}][id]" value="{{ $option->id }}">
                                        <select name="options[{{ $option->id }}][value_id]" id="option_value_id_{{ $option->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5s">
                                            <option value="" selected>Choose an option</option>
                                            @foreach ($option->values as $value)
                                                <option value="{{ $value->id }}">{{ $value->value }}</option>
                                            @endforeach
                                        </select>
                                    @endforeach
                                    @guest
                                        <a href="{{ route('login') }}" class="block text-center bg-emerald-500 hover:bg-emerald-600 hover:-translate-y-1 transition-all duration-300 text-slate-50 py-2 px-3 w-full mt-4 shadow-lg rounded-lg">Login to Continue</a>
                                    @endguest
                                    @auth
                                            <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 hover:-translate-y-1 transition-all duration-300 text-slate-50 py-2 px-3 w-full mt-4 shadow-lg rounded-lg">
                                                <i class="fa-solid fa-cart-shopping"></i> Add to cart
                                            </button>
                                    @endauth
                                </form>


                            </div>
                        @endif
                    </div>
                    <div class="mt-4 mx-2 md:mt-0 w-8/12">
                        <div class="title">
                            <h5 class="font-bold text-slate-800 text-xl my-4">Description</h5>
                        </div>
                        {!! $program->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<!-- Swiper JS -->
{{-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
{{-- <script>
    var swiper = new Swiper(".mySwiper", {
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script> --}}
<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 5,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
        spaceBetween: 5,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>
@endpush
