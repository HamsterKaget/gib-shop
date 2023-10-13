<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        if(Auth::user()->admin) {

        } else {
            return view('backend.sections.user.transactions.index');
        }
    }

    public function getData()
    {
        $user = Auth::user();
        $orders = Orders::with(["orderDetails.orderDetailOptions.optionValue.Option", "orderDetails.program"])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc') // Order by created_at in descending order
            ->orderBy('updated_at', 'desc') // Then order by updated_at in descending order
            ->paginate(10);


        return response()->json($orders, 200);
    }

}
