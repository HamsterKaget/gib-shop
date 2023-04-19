@extends('user.layouts.app')

@section('content')
    {{-- @dd($program) --}}
    <div class="container mx-auto my-6">
        <div class="flex flex-wrap">
            <div class="w-4/10">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!-- Swiper carousel code here -->
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @if($program->thumbnail)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($program->thumbnail) }}" class="max-h-72" alt="{{ $program->title }}">
                                    </div>
                                @endif
                                @if (!$program->Image->isEmpty())
                                    @foreach ($program->Image as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ asset($image->image) }}"  class="max-h-72" alt="{{ $program->title }}">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="w-6/10 px-8">
            <h1 class="text-3xl font-bold mb-4">{{ $program->title }}</h1>
            <div class="mb-4">
                <span class="text-lg font-bold">{{ $program->price }}</span>
                @if ($program->discount > 0)
                <span class="text-sm text-gray-600 ml-2 line-through">{{ $program->original_price }}</span>
                @endif
            </div>
            <div class="mb-4">
                @if ($program->Option->isNotEmpty())
                    @foreach ($program->Option as $option)
                        <div class="flex items-center mb-2">
                            <span class="font-bold mr-2">{{ $option->name }}:</span>
                            <div class="flex flex-wrap">
                            @foreach ($option->Value as $value)
                                <label class="inline-flex items-center mr-4">
                                <input type="checkbox" name="Option[]" value="{{ $value->id }}" class="form-checkbox">
                                <span class="ml-2">{{ $value->name }}</span>
                                </label>
                            @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            @if (auth()->check())
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">Add to Cart</button>
            @else
                <a href="{{ route('login') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">Buy Now</a>
            @endif
            </div>
        </div>
        <div class="mt-8">
            <h2 class="text-lg font-bold mb-4">Description</h2>
            <div class="text-gray-700 leading-relaxed">{!! $program->description !!}</div>
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
