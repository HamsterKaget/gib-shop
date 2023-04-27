@extends('user.layouts.app')

@section('content')
    <div class="min-h-screen mx-auto w-screen h-full">
        <div class="grid grid-cols-1">
            <div class=" bg-sky-100 py-8">
                <div class="md:flex max-w-[90vw] mx-auto">
                    <div class="mx-2 md:mx-4 lg:mx-8 md:w-4/10">
                        @if($program->thumbnail)
                                <img class="max-h-96 rounded-lg"
                                    src="{{ asset($program->thumbnail) }}" alt="{{ $program->title }}">
                        @endif
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
            <div class="py-2">
                <div class="md:flex max-w-[90vw] mx-auto">
                    <div class="mx-2 md:mx-4 lg:mx-8 w-4/12">
                        @if ($program->Option->isNotEmpty())
                            <div class="mt-4 md:mt-8 w-full rounded-lg bg-slate-50 shadow-lg p-4">
                                <h5 class="font-bold text-lg mb-2 text-center uppercase">Choose Variant</h5>
                                <hr>
                                <div class="my-4"></div>
                                <form action="" method="post">
                                    @csrf
                                    <input type="hidden" name="program_id" value="{{ $program->id }}">
                                    @foreach ($program->Option as $option)
                                        {{-- display the name of the option --}}
                                        <label for="option_value_id" class="block my-2 mx-2 text-sm font-medium text-gray-900">Select an {{ $option->options }}</label>
                                        {{-- <label for="option_value_id" class="text-slate-800 font-bold d-block">{{ $option->options }}</label> --}}
                                        {{-- save the option id --}}
                                        <input type="hidden" name="option_id" value="{{ $option->id }}">
                                        {{-- display and get selected value id for the option values --}}
                                        {{-- <select name="option_value_id" id="option_value_id"> --}}
                                        <select name="option_value_id" id="option_value_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5s">
                                            <option selected>Choose an option</option>
                                            @if ($option->Value->isNotEmpty())
                                                @foreach ($option->Value as $value)
                                                    <option value="{{ $value->id }}">{{ $value->value }}e</option>
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

@section('scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var mySwiper = new Swiper('.swiper-container', {
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>
@endsection
