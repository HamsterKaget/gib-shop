@extends('user.layouts.app')

@section('title')
        {{ "Buy Ticket " . $program->title . " | GatheringInBali" }}
@endsection

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
    <div class="min-h-screen bg-sky-100 mx-auto h-full">
        <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-left lg:hidden mt-12">{{ $program->title }}</h1>
        <div class="grid max-w-[1980px] overflow-x-hidden -space-x-3 grid-cols-1 xl:grid-cols-2">
            <div class="py-8">
                <div class="md:flex mx-auto lg:max-w-[650px] max-w-[90vw]">
                    <div class="md:w-4/10">
                        <div class="swiper mySwiper2 lg:max-w-[650px] max-w-[90vw]">
                            <div class="swiper-wrapper">
                                @if($program->thumbnail)
                                <div class="swiper-slide">
                                    {{-- <img class="h-54 w-full object-cover" src="{{ strpos($program->thumbnail, 'images/Thumbnail') === 0 ? asset($program->thumbnail) : Storage::url($program->thumbnail) }}" alt="Card Image"> --}}
                                    <img class="lg:max-h-[512px] sm:max-h-[85vh] max-h-[90vw] rounded-lg mx-auto" src="{{ strpos($program->thumbnail, 'images/Thumbnail') === 0 ? asset($program->thumbnail) : Storage::url($program->thumbnail) }}" alt="{{ $program->title }}">
                                </div>
                                @endif
                                @if ($program->Image->isNotEmpty())
                                    @foreach($program->Image as $image)
                                    <div class="swiper-slide">
                                        <img class="lg:max-h-[512px] sm:max-h-[85vh] max-h-[90vw] rounded-lg mx-auto" src="{{ asset($image->image) }}" alt="{{ $program->title }}">
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="swiper-button-next hidden md:block"></div>
                            <div class="swiper-button-prev hidden md:block"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper" style="max-width: 500px; margin-top: 15px;">
                            <div class="swiper-wrapper">
                                @if($program->thumbnail)
                                <div class="swiper-slide">
                                    <img class="max-h-56 rounded-lg" src="{{ strpos($program->thumbnail, 'images/Thumbnail') === 0 ? asset($program->thumbnail) : Storage::url($program->thumbnail) }}" alt="{{ $program->title }}">
                                </div>
                                @endif
                                @if ($program->Image->isNotEmpty())
                                @foreach($program->Image as $image)
                                <div class="swiper-slide">
                                    <img class="max-h-56 p-2 rounded-lg" src="{{ asset($image->image) }}" alt="{{ $program->title }}">
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
                </div>
            </div>
            <div class="py-4 mb-12">
                <div class="md:grid max-w-[90vw] mx-auto grid-cols-1">
                    <div class="mt-4 mx-2 md:mt-0">
                        <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-left hidden lg:block">{{ $program->title }}</h1>
                        <div class="md:grid md:grid-cols-2">
                            <div class="mt-4 md:mt-8 w-full lg:w-9/12 mx-auto md:mx-0 md:mr-auto rounded-lg bg-slate-50 shadow-lg p-4">
                                {{-- ?<h5 class="font-bold text-lg  text-center lg:text-left mb-2">Detail Information</h5> --}}
                                <h5 class="font-bold text-lg mb-2 text-center uppercase">Detail Information</h5>
                                <hr>
                                <div class="my-auto">
                                    <div class="my-4 flex items-start flex-col space-y-2">
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <span class="ml-1.5">
                                                {{ $program->location }}
                                            </span>
                                        </span>
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                            <i class="fa-solid fa-calendar"></i>
                                            <span class="ml-1.5">
                                                {{ date_format(date_create($program->start_date),"D, d M Y"); }}
                                            </span>
                                        </span>
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                            <i class="fa-solid fa-calendar"></i>
                                            <span class="ml-1.5">
                                                {{ date_format(date_create($program->end_date),"D, d M Y"); }}
                                            </span>
                                        </span>
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                            <i class="fa-solid fa-clock"></i>
                                            <span class="ml-1.5">
                                                {{ $program->time }} </td>
                                            </span>
                                        </span>
                                    </div>
                                    <hr>
                                    <div class="mt-4 flex items-start flex-col space-y-2">
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                            <i class="fa-solid fa-cube"></i>
                                            <span class="ml-1.5">
                                                {{ number_format($program->stock) }} Left
                                            </span>
                                        </span>
                                        {{-- <span> --}}
                                        @php
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
                                        @endphp
                                            @if (isset($program->Discount[0]))
                                                <span class="bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-red-700 dark:text-red-400 border border-gray-500">
                                                    <i class="fa-solid fa-tags"></i>
                                                    <span class="ml-1.5">
                                                        Rp {{ number_format($discountedPrice) }}
                                                        /
                                                        $ {{ number_format(($discountedPrice / 15000)) }}
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
                                                <span class="opacity-60 line-through bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                                    <i class="fa-solid fa-tags"></i>
                                                    <span class="ml-1.5">
                                                        Rp {{ number_format($program->price) }}
                                                        /
                                                        $ {{ number_format(($program->price / 15000)) }}
                                                    </span>
                                                </span>
                                                @else
                                                <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                                    <i class="fa-solid fa-tags"></i>
                                                    <span class="ml-1.5">
                                                        Rp {{ number_format($program->price) }}
                                                        /
                                                        $ {{ number_format(($program->price / 15000)) }}
                                                    </span>
                                                </span>
                                            @endif
                                            {{-- <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                                <i class="fa-solid fa-tags"></i>
                                                <span class="ml-1.5">
                                                </span>
                                            </span> --}}
                                        {{-- </span> --}}
                                    </div>
                                    {{-- <p><i class="fa-solid fa-cube m-1"></i> Stock : {{ $program->stock }}</p>
                                    <p class="mt-1"><i class="fa-solid fa-calendar m-1"></i> Start Date : {{date_format(date_create($program->start_date),"D, d M Y"); }}</p>
                                    <p class="mt-1"><i class="fa-solid fa-calendar m-1"></i> End Date : {{date_format(date_create($program->end_date),"D, d M Y"); }}</p>
                                    <p class="mt-1"><i class="fa-solid fa-clock m-1"></i> Time : {{ $program->time }}</p>
                                    <p class="mt-1"><i class="fa-solid fa-tags m-1"></i> Price : Rp {{ number_format($program->price) }}</p> --}}
                                </div>
                            </div>

                            <div class="w-full lg:w-9/12 mx-auto md:ml-4 lg:mr-auto lg:-ml-16">
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
                                                <select required name="options[{{ $option->id }}][value_id]" id="option_value_id_{{ $option->id }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5s">
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
                        </div>
                    </div>

                    <hr>

                    <div class="mt-4 mx-2 md:mt-0 w-full">
                        <div class="title">
                            <h5 class="font-bold text-slate-800 text-xl text-center lg:text-left my-4">Description</h5>
                        </div>
                        <div class="lg:pr-8">
                            {!! $program->description !!}
                        </div>
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
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            320: {
            slidesPerView: 3,
            spaceBetween: 5
            },
            // when window width is >= 480px
            480: {
            slidesPerView: 3,
            spaceBetween:5
            },
            // when window width is >= 640px
            640: {
            slidesPerView: 4,
            spaceBetween: 10
            }
        }
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
