<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home() {
        return view('user.modules.dashboard.home.index');
    }

    public function transaction() {
        $user = Auth::user();
        $orders = Orders::with(["orderDetails.orderDetailOptions.optionValue.Option", "orderDetails.program"])->where('user_id', $user->id)->get();
        // dd($orders);
        return view('user.modules.dashboard.transaction.index', compact('orders'));
    }

    public function ticket() {
        $user = Auth::user();
        $ticket = Ticket::with(['program', 'order.orderDetails.orderDetailOptions.optionValue.Option'])->where('user_id', $user->id)->get();
        // dd($ticket);
        return view('user.modules.dashboard.ticket.index', compact('ticket'));
    }

    public function ticketDetail(Request $request) {
        $request ->validate([
            'uuid' => "required|exists:ticket,ticket_uuid"
        ]);
        $ticket = Ticket::with(['program', 'order.orderDetails.orderDetailOptions.optionValue.Option'])->where(["ticket_uuid" => $request->uuid])->first();
        // dd($ticket);
        return view('user.modules.dashboard.ticket.detail', compact('ticket'));
    }

}
