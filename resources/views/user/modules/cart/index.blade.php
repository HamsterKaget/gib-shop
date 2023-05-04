@extends('user.layouts.app')

@section('title', 'My Page Title')

@push('css')
    <!-- Add Swiper JS and CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endpush

@section('content')
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold mb-8">Your Cart</h1>
        @php
            $total = 0;
        @endphp
        @if($cart && count($cart->Details) > 0)
        <div class="flex flex-col">
            {{-- @dd() --}}
            {{-- @if (count($cart->Details) > 0) --}}
                @foreach($cart->Details as $detail)
                    <div class="flex flex-col md:flex-row md:items-start border-b-2 py-4">
                    <div class="w-full md:w-1/3">
                        <img src="{{ asset($detail->Program->thumbnail) }}" alt="{{ $detail->Program->name }}" class="h-64 mx-auto w-auto rounded-lg object-cover shadow-lg">
                    </div>
                    <div class="flex flex-col justify-between items-start w-full md:w-2/3 px-4">
                        <div class="flex flex-col items-start">
                            <h2 class="font-bold text-2xl">{{ $detail->Program->title }}</h2>
                            {{-- <p class="text-sm text-gray-500 mb-2">{{ $detail->Program->description }}</p> --}}
                            <div class="flex items-center mb-2">
                                <span class="font-bold text-gray-700 mr-2">Quantity:</span>
                                <span>{{ $detail->quantity }}</span>
                            </div>
                            @foreach($detail->Options as $option)
                            <div class="flex items-center">
                                <span class="font-bold text-gray-700 mr-2">{{ $option->ProgramOption->options }}:</span>
                                <span>{{ $option->OptionValue->value }}</span>
                            </div>
                            @endforeach
                            </div>
                            <div class="flex items-center w-full">
                                <span class="font-bold text-gray-700 mr-2">Price:</span>
                                @php
                                    $total += $detail->Program->price * $detail->quantity;
                                @endphp
                                <span>Rp {{ $detail->Program->price * $detail->quantity }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            {{-- <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Green</button> --}}
                            {{-- <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Remove</button> --}}
                            <form action="{{ route('cart.remove', $detail->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Remove</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            {{-- @endif --}}
        </div>
        <div class="flex justify-between items-start mt-8">
            <span class="font-bold text-lg">Total:</span>
            <div class="flex flex-col space-y-2">
                <span class="font-bold text-lg">Rp {{ $total }}</span>
                <form action="{{ route('checkout')}}" method="POST">
                    @csrf
                    <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                    <button class="bg-green-500 text-white hover:bg-green-700 py-2 px-4 rounded-lg shadow-lg text-sm">Checkout</button>
                </form>
            </div>
        </div>
        @else
        <p class="text-lg">Your cart is currently empty.</p>
        @endif
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
