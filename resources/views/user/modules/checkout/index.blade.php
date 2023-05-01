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
    <div class="container">
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
    </div>

@endsection

@push('js')

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
@endpush
