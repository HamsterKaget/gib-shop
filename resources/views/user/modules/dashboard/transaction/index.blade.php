@extends('user.layouts.dashboard')

@push('css')
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    {{-- <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SET_YOUR_CLIENT_KEY_HERE"></script> --}}
    {{-- <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script> --}}
    <script type="text/javascript" src="{{ config('midtrans.snap_url') }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
@endpush
@section('title')
    Dashboard - Transaction
@endsection
@section('content')
    <div class="w-full min-h-screen shadow-lg rounded-lg p-4">
        <div class="bg-white shadow-lg rounded-lg p-4 dark:bg-gray-800 dark:border-gray-700">
            <h2 class="text-lg font-medium mb-4">Summary</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                {{-- Counter Total Ticket --}}
                <div class="max-w-sm p-6 py-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center text-center hover:bg-blue-50 hover:-translate-y-2 transition-all duration-300">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><span id="counter-total-transaction">0</span></h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total Transaction</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-blue-700 border-blue-700 border rounded-lg hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-300">
                        More Detail
                        <svg aria-hidden="true" class="w-2.5 h-2.5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
                {{-- Counter Total Price --}}
                <div class="max-w-sm p-6 py-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center text-center hover:bg-blue-50 hover:-translate-y-2 transition-all duration-300">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" ><span id="counter-total-price">0</span></h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total Price</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-blue-700 border-blue-700 border rounded-lg hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-300">
                        More Detail
                        <svg aria-hidden="true" class="w-2.5 h-2.5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>

            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg mt-4 p-4">
            <h2 class="text-lg font-medium p-4">List Transaction</h2>
            {{-- <div class="flex justify-end mb-3">
                <button id="createButton" data-modal-target="defaultModal" onclick="createAction()"  class="bg-green-400 hover:bg-green-600 text-white py-1 px-3 rounded">
                    <i class="fa-solid fa-plus fa-sm"></i><span class="ml-1.5">Add New Record</span>
                </button>
                <button id="succesButton" data-modal-target="successModal" data-modal-toggle="successModal" class="hidden bg-green-400 hover:bg-green-600 text-white py-1 px-3 rounded">
                    <i class="fa-solid fa-plus fa-sm"></i><span class="ml-1.5">Show Modal</span>
                </button>
            </div> --}}
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Order Code</th>
                        <th class="border px-4 py-2">Total Amount</th>
                        <th class="border px-4 py-2">Status</th>
                        <th class="border px-4 py-2">Datetime</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($orders as $order)
                        {{-- @dd($order) --}}
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ ++$i }}</td>
                            <td class="border px-4 py-2">{{ $order->uuid }}</td>
                            <td class="border px-4 py-2">{{ $order->total_amount_paid }}</td>
                            <td class="border px-4 py-2">{{ $order->status }}</td>
                            <td class="border px-4 py-2">{{ date_format(date_create($order->created_at),"D, d M Y, H:i:s e") }}</td>
                            <td class="border px-4 py-2">
                                @if ($order->status == "pending")
                                <button class="bg-green-500 border-green-500 border-2 text-white py-1 px-3 w-full rounded" onclick="makePayment('{{ $order->snaptoken }}')">
                                    <span class="text-sm">Pay Now</span>
                                </button>
                                @elseif ($order->status == "Success")
                                    <button class="border-green-500 border-2 text-green-500 py-1 px-3 w-full rounded cursor-not-allowed" disabled>
                                        <span class="text-sm">Paid</span>
                                    </button>
                                @elseif ($order->status == "Failed")
                                    <button class="border-red-500 border-2 text-red-500 py-1 px-3 w-full rounded cursor-not-allowed" disabled>
                                        <span class="text-sm">Failed</span>
                                    </button>
                                @endif
                            </td>

                            {{--
                            <td class="border px-4 py-2">
                                <button onclick="editAction(this)" data-json="{{ json_encode($user) }}" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">
                                    <i class="fa-solid fa-pen-to-square fa-sm"></i>
                                </button>

                                <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded ml-2" onclick="deleteUser({{ $user->id }})">
                                    <i class="fa-solid fa-trash fa-sm"></i>
                                </button>

                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- {{ $users->links() }} --}}
        </div>
    </div>


@endsection

@push('script')

<script>
function makePayment(snapToken) {
    snap.pay(snapToken, {
    onSuccess: function(result) {
        /* You may add your own implementation here */
        alert("payment success!");
        console.log(result);
    },
    onPending: function(result) {
        /* You may add your own implementation here */
        alert("wating your payment!");
        console.log(result);
    },
    onError: function(result) {
        /* You may add your own implementation here */
        alert("payment failed!");
        console.log(result);
    },
    onClose: function() {
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
    }
    });
}
</script>

@endpush



