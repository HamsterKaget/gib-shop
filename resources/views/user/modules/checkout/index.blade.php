@extends('user.layouts.app')

@section('title', 'Checkout')

@push('css')
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    {{-- <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SET_YOUR_CLIENT_KEY_HERE"></script> --}}
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
@endpush

@section('content')
    {{-- <div class="container">
        <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Checkout</h1>
        <hr class="border-t-2 border-gray-300">
        </div>
        <div class="mb-4">
        <h3 class="text-lg font-bold mb-2">Order Details</h3>
        <table class="w-full border-collapse">
            <thead>
            <tr>
                <th class="py-2 px-3 bg-gray-200 border-b border-gray-400">Program Name</th>
                <th class="py-2 px-3 bg-gray-200 border-b border-gray-400">Quantity</th>
                <th class="py-2 px-3 bg-gray-200 border-b border-gray-400">Price</th>
                <th class="py-2 px-3 bg-gray-200 border-b border-gray-400">Subtotal</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($order->orderDetails as $detail)
                <tr>
                <td class="py-2 px-3 border-b border-gray-400">{{ $detail->program->name }}</td>
                <td class="py-2 px-3 border-b border-gray-400">{{ $detail->quantity }}</td>
                <td class="py-2 px-3 border-b border-gray-400">{{ $detail->program->price }}</td>
                <td class="py-2 px-3 border-b border-gray-400">{{ $detail->program->price * $detail->quantity }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="py-2 px-3 text-right font-bold">Total</td>
                <td class="py-2 px-3 font-bold">{{ $order->total_amount }}</td>
            </tr>
            </tbody>
        </table>
        </div>
        <button id="pay-button" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600">Pay Now</button>
    </div> --}}

    <div class="w-screen">
        <section class="bg-slate-50 dark:bg-gray-900">
            <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md bg-white">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Checkout</h2>
                <p class="mb-6 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Here you can review your order, make any necessary changes, and complete your purchase</p>


                <div class="flex flex-col space-y-6 py-4 mb-6 items-center w-full mx-auto bg-gray-100 rounded-lg">
                    @php
                        $total = 0;
                    @endphp
                    <p class="text-center text-gray-500 dark:text-gray-400 sm:text-xl uppercase text-sm font-bold">List Of The Item You Will Buy</p>
                    @foreach($cart->Details as $detail)
                    @php
                        $total += $detail->Program->price * $detail->quantity;
                    @endphp
                        {{-- @dd($detail) --}}
                        <a href="#" class="flex flex-col items-center shadow-lg bg-white border border-gray-200 rounded-lg md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset($detail->Program->thumbnail) }}" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $detail->Program->title }}</h5>
                                {{-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p> --}}
                                <div class="flex flex-col items-start space-y-1.5">
                                    @foreach($detail->Options as $option)
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        <i class="fa-solid fa-filter mr-1.5"></i> {{ $option->ProgramOption->options }}:
                                        <span class="ml-1.5">
                                            {{ $option->OptionValue->value }}
                                        </span>
                                    </span>
                                    @endforeach
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        <i class="fa-solid fa-tags mr-1.5"></i>
                                        <span class="ml-1.5">
                                            Rp {{ number_format($detail->Program->price) }}
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <form action="{{ route('checkout.pay')}}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="cart_id" value="{{ $cart->id }}">

                    <div class="grid grid-cols-2 space-x-4">
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">First Name <span class="text-red-600">*</span> </label>
                            <input type="text" name="first_name" id="first_name" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" required>
                        </div>
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Last Name <span class="text-red-600">*</span> </label>
                            <input type="text" name="last_name" id="last_name" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 space-x-4">
                        <div>
                            <label for="user_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email <span class="text-red-600">*</span> </label>
                            <input type="email" name="user_email" id="user_email" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled value="{{ Auth::user()->email }}" required>
                        </div>
                        <div>
                            <label for="backup_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Backup Email </label>
                            <input type="email" name="backup_email" id="backup_email" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your Address</label>
                        <textarea name="address" id="address" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                    </div>

                    <div class="flex flex-col space-y-2 items-end">
                        <span class="font-bold text-lg">Rp {{ number_format($total) }} | $ {{ number_format(($total / 15000)) }}<br></span>
                        @if (isset($snapToken))
                            <button id="pay-button" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600">Pay Now</button>
                        @else
                            <button type="submit" class="-mt-2 bg-green-500 text-white hover:bg-green-700 py-2 px-4 rounded-lg shadow-lg text-sm">Checkout</button>
                        @endif
                    </div>
                    {{-- <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Send message</button> --}}
                </form>
            </div>
        </section>
    </div>
@endsection

@push('js')

@if (isset($snapToken))
<script>
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
    snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
        /* You may add your own implementation here */
        alert("payment success!"); console.log(result);
        },
        onPending: function(result){
        /* You may add your own implementation here */
        alert("wating your payment!"); console.log(result);
        },
        onError: function(result){
        /* You may add your own implementation here */
        alert("payment failed!"); console.log(result);
    },
    onClose: function(){
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
    }
    })
});
</script>
@endif
@endpush
