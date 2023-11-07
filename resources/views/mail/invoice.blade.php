<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- <meta charset="utf-8"> --}}
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Shop Gathering in Bali | Invoice')</title>

        {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}
        <script src="https://cdn.tailwindcss.com"></script>


        @stack('pre-css')
        {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com"> --}}
        @stack('post-css')
        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
        {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}

    </head>


    <body class="">
        {{-- @include('backend.layout.sidebar') --}}

        {{-- @yield('content') --}}
        {{-- @dd($order) --}}
        <section class="bg-white">
            <div class="container mx-auto my-auto flex flex-col items-center justify-center w-full">
                <div class="flex justify-between items-center w-full my-8">
                    <a href="{{ route('dashboard.home') }}">
                        <img src="https://shop.gatheringinbali.com/images/favicon.png" class="w-16 h-auto" alt="logo gib">
                    </a>
                    <div class="flex flex-col justify-end text-slate-500 text-xs text-right">
                        <h3>GatheringInBali</h3>
                        <h3>PaymentID / Invoice #{{ $order->uuid }}</h3>
                        <h3>{{  now()->format('D, d F Y') }}</h3>
                    </div>
                </div>

                {{-- @dd($order->user) --}}
                <div class="text-left w-full">

                    <p>
                        Dear <b>{{ $order->user->name }}</b>,
                    </p>

                    <p>Thank you for completing your order at <span><a style="text-color: blue; text-decoration: underline;" href="https://shop.gatheringinbali.com">shop.gatheringinbali.com</a></span> We have received your payment, here are the details :</p>

                    <p> You can download the invoice by <a style="text-color: blue; text-decoration: underline;" href="{{ route('invoice') }}?uuid={{ $order->uuid }}">clicking here</a>, you can also check your ticket on the <a style="text-color: blue; text-decoration: underline;" href="{{route('user-dashboard.v2.ticket.index')}}">ticket dashboard</></p>

                </div>

                <div class="border border-black px-8 mx-auto w-full" style="margin-top: 14px;">
                    <div class="flex justify-between items-center p-6 mx-auto border-b border-black">
                        <h2 class="font-bold text-lg">
                            SETTLED
                        </h2>
                        <p class="text-slate-500 text-sm">Thank you for purchasing</p>
                    </div>
                    <div class="flex flex-col text-slate-500 space-y-2 my-6">
                        <h3 class="font-bold mt-6 text-lg text-slate-800">Summary</h3>
                        {{-- @dd($order->orderDetails) --}}
                        <div class="flex flex-col space-y-3 justify-between item-center text-sm py-3 ">
                        @php
                            $discount = 0;
                            $total = 0;
                        @endphp
                        @foreach ($order->orderDetails as $orderDetail)
                            @php
                            if(isset($orderDetail->program->discount[0]))
                            {
                                $discount += $orderDetail->program->discount[0]->discount;
                            }
                            $total += $orderDetail->program->price;
                            @endphp
                            <div class="flex justify-between item-center">
                                <h4 class="text-slate-800 ">{{ $orderDetail->program->title }} <span class="font-bold">x{{ $orderDetail->quantity }}</span></h4>
                                <p>Rp {{ number_format($orderDetail->program->price * $orderDetail->quantity) }}</p>
                            </div>
                        @endforeach
                        </div>
                        <div class="flex flex-col space-y-2 justify-between item-center text-sm border-y py-3 border-black">
                            <div class="flex justify-between item-center">
                                <h4 class="text-slate-800 ">Total Discount </h4>
                                <p class="text-red-500">- Rp {{ number_format($discount) }}</p>
                            </div>
                            <div class="flex justify-between item-center">
                                <h4 class="text-slate-800 ">Payment Fee (3% * Total Amount)</h4>
                                <p>{{ number_format(0.03 * ($total - $discount)) }}</p>
                            </div>
                        </div>
                        <div class="flex justify-between item-center py-2">
                            <h4 class="text-slate-800 font-bold">TOTAL</h4>
                            <p>Rp {{ number_format($order->total_amount_paid) }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between w-full my-8">
                    <div class="max-w-md">
                        <h3 class="mb-2 text-slate-500 font-bold">Any Question ?</h3>
                        <p class="text-slate-500 text-sm">Please contact us via email contact@gatheringinbali.com or<br>
                             contact us via WhatsApp at +62 812-6756-0600</p>
                    </div>
                    <div class="max-w-md">
                        <h3 class="mb-2 font-semibold text-sm">gatheringinbali.com | shop.gatheringinbali.com</h3>
                        <p class="text-slate-500 text-sm">Skyview Apartment 7/26 Jl. Lengkong Gudang Timur Raya Kel Lengkong
                            Kota Tangerang Selatan, Banten 15311
                            Indonesia</p>
                    </div>
                </div>

            </div>
        </section>

        <script>
            window.print();
        </script>
      </body>
</html>
