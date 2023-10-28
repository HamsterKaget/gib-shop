<?php

namespace App\Http\Controllers;

use App\Mail\ticketConfirmation;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderDetailOption;
use App\Models\OrderDetailOptions;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Program;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PSpell\Config;

class OrdersController extends Controller
{
    public function index(Request $request) {
        $cart = Cart::where('user_id', Auth::id())->with('Details.Program', 'Details.Options.OptionValue')->first();

        return view('user.modules.checkout.index', compact('cart'));
    }

    public function checkout(Request $request) {
        $request->validate([
            'cart_id' => 'required|exists:cart,id',
            'first_name' => 'required',
            'backup_email' => 'nullable',
            'address' => 'nullable',
        ]);

        $cart = Cart::with(['Details.Options', 'User', 'Details.Program.Discount'])->findOrFail($request->cart_id);

        // Generate the UUID
        $timestamp = round(microtime(true) * 1000);
        $lastOrderId = DB::table('orders')->latest('id')->value('id');
        $uuid = $timestamp . "-" . Auth::user()->id . "-" . ++$lastOrderId;

        // Get the program details from the cart details
        $programDetails = $cart->Details()->get();

        // Calculate the total amount to be paid
        $totalAmount = 0;
        $totalDiscount = 0; // Initialize the total discount

        foreach ($programDetails as $programDetail) {
            $program = $programDetail->Program()->first();
            $itemPrice = $program->price * $programDetail->quantity;

            // Check if there is a discount for this program
            if ($program->discount && count($program->discount) > 0) {
                $discount = $program->discount[0];
                // if ($discount->percent) {
                //     // Calculate the discount based on a percentage
                //     $discountAmount = ($discount->percent / 100) * $itemPrice;
                // } else {
                    // Use the fixed discount amount
                    $discountAmount = $discount->discount * $programDetail->quantity;
                // }

                // Deduct the discount amount from the item price
                $itemPrice -= $itemPrice - $discountAmount;

                // Add the discount to the total discount
                $totalDiscount += $discountAmount;
            }

            $totalAmount += $itemPrice;

            // Build the item detail array for this program
            $itemDetails[] = [
                'id' => 'item_' . $program->id,
                'price' => $itemPrice,
                'quantity' => $programDetail->quantity,
                'name' => $program->title,
            ];

            $itemPrice = 0;
        }
        // Calculate the total amount to be paid after discounts
        $itemDetails[] = [
            'id' => 'fee',
            'price' => $totalAmount * 0.03,
            'quantity' => 1,
            'name' => 'Payment Fee',
        ];

        $totalAmount += round($totalAmount * 0.03); // Adding 3% to the totalAmount



        // Create an order record
        $order = Orders::create([
            'user_id' => $cart->user_id,
            'uuid' => $uuid,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'backup_email' => $request->backup_email,
            'address' => $request->address,
            'status' => 'PENDING',
            'total_amount_paid' => $totalAmount,
        ]);


        // dd($totalAmount, $itemDetails);
        // return;


        // Use the created order ID in the transaction details parameter
        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $totalAmount,
            ),
            'customer_details' => array(
                'first_name' => $cart->User()->first()->name,
                'last_name' => '',
                'email' => $cart->User()->first()->email,
                // 'phone' => $cart->User()->first()->phone,
            ),
            'item_details' => $itemDetails,


        );

        // dd($params);


        // Get the Snap Token
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // set column snaptoken in Orders model wheere id = $order->id
        $order->update(['snaptoken' => $snapToken]);
        $cart->delete();

        // return view('user.modules.checkout.index', compact('snapToken', 'order', 'cart'));
        // return redirect()->to(route('user-dashboard.transaction'));
        return response()->json($snapToken);
        // dd($snapToken);

    }
    // public function checkout(Request $request) {
    //     $request->validate([
    //         'cart_id' => 'required|exists:cart,id',
    //         'first_name' => 'required',
    //         'backup_email' => 'nullable',
    //         'address' => 'nullable',
    //     ]);

    //     $cart = Cart::with(['Details.Options', 'User', 'Details.Program.Discount'])->findOrFail($request->cart_id);


    //     // Generate the UUID
    //     $timestamp = round(microtime(true) * 1000);
    //     $lastOrderId= DB::table('orders')->latest('id')->value('id');
    //     $uuid = $timestamp."-".Auth::user()->id."-".++$lastOrderId;

    //     // Get the program details from the cart details
    //     $programDetails = $cart->Details()->get();

    //     // dd($request);

    //     // Calculate the total amount to be paid
    //     $totalAmount = 0;
    //     foreach ($programDetails as $programDetail) {
    //         $program = $programDetail->Program()->first();
    //         $totalAmount += $program->price * $programDetail->quantity;
    //     }

    //     // dd($cart);
    //     // return;

    //     // $totalAmount += $totalAmount * 0.03; // Adding 3% to the totalAmount
    //     $totalAmount += round($totalAmount * 0.03);

    //      // Create an order record
    //     $order = Orders::create([
    //         'user_id' => $cart->user_id,
    //         'uuid' => $uuid,
    //         'first_name' => $request->first_name,
    //         'last_name' => $request->last_name,
    //         'backup_email' => $request->backup_email,
    //         'address' => $request->address,
    //         'status' => 'PENDING',
    //         'total_amount_paid' => $totalAmount,
    //     ]);

    //     // Loop through the cart details and create order detail and option records
    //     foreach ($cart->Details as $cartDetail) {
    //         $program = $cartDetail->Program()->first();
    //         $orderDetail = OrderDetails::create([
    //             'order_id' => $order->id,
    //             'program_id' => $program->id,
    //             'quantity' => $cartDetail->quantity,
    //         ]);

    //         foreach ($cartDetail->Options as $cartOption) {
    //             OrderDetailOptions::create([
    //                 'order_detail_id' => $orderDetail->id,
    //                 'program_option_id' => $cartOption->program_option_id,
    //                 'option_value_id' => $cartOption->option_value_id,
    //                 'quantity' => $cartOption->quantity,
    //             ]);
    //         }
    //         $program->stock -= 1;
    //         $program->save();
    //         // dd($program);
    //     }

    //     // Use the created order ID in the transaction details parameter
    //     $params = array(
    //         'transaction_details' => array(
    //             'order_id' => $order->id,
    //             'gross_amount' => $totalAmount,
    //         ),
    //         'customer_details' => array(
    //             'first_name' => $cart->User()->first()->name,
    //             'last_name' => '',
    //             'email' => $cart->User()->first()->email,
    //             // 'phone' => $cart->User()->first()->phone,
    //         ),
    //     );


    //     // Get the Snap Token
    //     \Midtrans\Config::$serverKey = config('midtrans.server_key');
    //     // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    //     \Midtrans\Config::$isProduction = config('midtrans.is_production');
    //     // Set sanitization on (default)
    //     \Midtrans\Config::$isSanitized = true;
    //     // Set 3DS transaction for credit card to true
    //     \Midtrans\Config::$is3ds = true;
    //     $snapToken = \Midtrans\Snap::getSnapToken($params);

    //     // set column snaptoken in Orders model wheere id = $order->id
    //     $order->update(['snaptoken' => $snapToken]);
    //     $cart->delete();

    //     // return view('user.modules.checkout.index', compact('snapToken', 'order', 'cart'));
    //     // return redirect()->to(route('user-dashboard.transaction'));
    //     return response()->json($snapToken);
    //     // dd($snapToken);

    // }


    // public function callback(Request $request)
    // {
    //     // Verify the signature
    //     $signatureKey = Config::getSignatureKey();
    //     $rawBody = $request->getContent();
    //     $signature = $request->header('signature');
    //     $expectedSignature = hash('sha512', $rawBody . $signatureKey);
    //     if ($signature !== $expectedSignature) {
    //         return response('Invalid signature.', 400);
    //     }

    //     // Process the callback data
    //     // $orderId = $request->input('order_id');
    //     // $transactionStatus = $request->input('transaction_status');
    //     // ...

    //     $orderId = $request->input('order_id');
    //     $transactionStatus = $request->input('transaction_status');
    //     $fraudStatus = $request->input('fraud_status');
    //     $orderIdArray = explode('-', $orderId);

    //     if (count($orderIdArray) < 2) {
    //         abort(400, 'Invalid order ID');
    //     }

    //     $order = Orders::find($orderIdArray[1]);

    //     if (!$order) {
    //         abort(404, 'Order not found');
    //     }

    //     if ($transactionStatus == 'capture' && $fraudStatus == 'accept') {
    //         // Payment success, update order status as paid
    //         $order->status = 'paid';
    //         $order->total_amount_paid = $request->input('gross_amount');
    //         $order->save();
    //     } else if ($transactionStatus == 'settlement' && $fraudStatus == 'accept') {
    //         // Payment success, update order status as paid
    //         $order->status = 'paid';
    //         $order->total_amount_paid = $request->input('gross_amount');
    //         $order->save();
    //     } else if ($transactionStatus == 'deny') {
    //         // Payment denied, update order status as failed
    //         $order->status = 'failed';
    //         $order->save();
    //     } else if ($transactionStatus == 'expire') {
    //         // Payment expired, update order status as expired
    //         $order->status = 'expired';
    //         $order->save();
    //     } else if ($transactionStatus == 'cancel') {
    //         // Payment cancelled, update order status as cancelled
    //         $order->status = 'cancelled';
    //         $order->save();
    //     }

    //     return response('OK');
    // }

    public function callback(Request $request)
    {

        $signatureKey = config('midtrans.server_key');
        $orderId = $request->order_id;
        $statusCode = $request->status_code;
        $grossAmount = $request->gross_amount;

        $stringToSign = $orderId . $statusCode . $grossAmount . $signatureKey;
        $expectedSignature = hash('sha512', $stringToSign);

        // Verify the signature
        // dd($signatureKey, $expectedSignature, $request->signature_key);
        // dd($request);
        if ($request->signature_key !== $expectedSignature) {
            abort(400, 'Invalid signature');
        }


        // Process the transaction based on the status code
        if ($statusCode == '200') {
            // TODO: update the order status and other relevant information
            $order = Orders::with(["orderDetails.orderDetailOptions.optionValue.Option", "orderDetails.program"])->where('id', $orderId)->first();

            if($request->status_code == 200) {
                $order->status = "Success";

                $i = 1;

                foreach ($order->orderDetails as $orderDetail) {
                    $p = Program::find($orderDetail->program_id);
                    $uuid = $orderDetail->id . $order->id . $order->user_id . $p->stock += $i++;
                    $ticket = Ticket::create([
                        "ticket_uuid" => $uuid,
                        "program_id" => $orderDetail->program_id,
                        "order_id" => $orderDetail->order_id,
                        "user_id" => $order->user_id,
                    ]);
                    // Send email confirmation to the user with the ticket UUID
                    $user = User::find($order->user_id);
                    Mail::to($user->email)->send(new ticketConfirmation($ticket));
                }



            } else if ($request->status_code == 201) {
                $order->status = "PENDING";
            } else if ($request->status_code == 202) {
                $order->status = "FAILED";
            } else {
                $order->status = "ERROR / UNPAID";
            }

            $order->save();
            return response('Payment success',200);
        } else {
            // Payment failed
            // TODO: update the order status and other relevant information
            $order = Orders::where('id', $orderId)->first();

            // $order->status = $request->status;
            $order->status = "FAILED";
            $order->save();
            return response('Payment failed', 200);
        }
    }




}
