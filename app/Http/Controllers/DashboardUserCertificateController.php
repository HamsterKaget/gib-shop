<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardUserCertificateController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('backend.sections.user.certificate.index');

    }

    public function getData(Request $request)
    {
        $query = Orders::with(["orderDetails.orderDetailOptions.optionValue.Option", "orderDetails.program"])->where('user_id', Auth::user()->id)->query();


        // if ($request->search) {
        //     $query->where('name', 'LIKE', "%" . $request->search . "%");
        // }

        $data = $query->orderBy('updated_at', 'desc') // Order by updated_at in descending order
                    ->orderBy('created_at', 'desc') // Then order by created_at in descending order
                    ->paginate(7);

        return response()->json($data, 200);
    }

}
