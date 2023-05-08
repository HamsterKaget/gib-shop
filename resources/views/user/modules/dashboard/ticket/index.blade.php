@extends('user.layouts.dashboard')

@push('css')
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    {{-- <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SET_YOUR_CLIENT_KEY_HERE"></script> --}}
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
@endpush
@section('title')
    Dashboard - Transaction
@endsection
@section('content')
    <div class="w-full min-h-screen shadow-lg rounded-lg p-4">
        <div class="bg-white shadow-lg rounded-lg mt-4 p-4">
            <h2 class="text-lg font-medium p-4">List Ticket</h2>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Ticket UUID</th>
                        <th class="border px-4 py-2">Program</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($ticket as $t)
                        {{-- @dd($t) --}}
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ ++$i }}</td>
                            <td class="border px-4 py-2">{{ $t->ticket_uuid }}</td>
                            <td class="border px-4 py-2">{{ $t->program->title }}</td>
                            {{-- <td class="border px-4 py-2">{{ date_format(date_create($order->created_at),"D, d M Y, H:i:s e") }}</td> --}}
                            <td class="border px-4 py-2">
                                <a href="{{ route('user-dashboard.ticket.view', ["uuid" => $t->ticket_uuid]) }}" class="border-green-500 border-2 text-green-500 py-1 px-3 w-full rounded">
                                    <span class="text-sm">View Ticket</span>
                                </a>
                            </td>
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



