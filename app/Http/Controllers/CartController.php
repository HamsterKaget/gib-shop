<?php

// namespace App\Http\Controllers;

// use App\Models\Cart;
// use App\Models\CartDetail;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class CartController extends Controller
// {
    // public function index()
    // {
    //     $cart = Cart::with('Details')->where('user_id', Auth::user()->id)->first();

    //     return view('cart.index', compact('cart'));
    // }

    // public function addToCart(Request $request)
    // {
    //     $cart = Cart::where('user_id', Auth::user()->id)->first();

    //     if (!$cart) {
    //         $cart = new Cart();
    //         $cart->user_id = Auth::user()->id;
    //         $cart->save();
    //     }

    //     $detail = new CartDetail();
    //     $detail->cart_id = $cart->id;
    //     $detail->program_id = $request->input('program_id');
    //     $detail->program_option_id = $request->input('program_option_id');
    //     $detail->option_value_id = $request->input('option_value_id');
    //     $detail->quantity = $request->input('quantity');
    //     $detail->save();

    //     return redirect()->back()->with('success', 'Added to cart successfully.');
    // }

    // public function removeFromCart($id)
    // {
    //     $detail = CartDetail::findOrFail($id);

    //     if ($detail->cart->user_id !== Auth::user()->id) {
    //         abort(403, 'Unauthorized action.');
    //     }

    //     $detail->delete();

    //     return redirect()->back()->with('success', 'Removed from cart successfully.');
    // }
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\CartDetailOption;
use App\Models\CartDetailOptions;
use App\Models\ProgramOption;
use App\Models\OptionValue;
use App\Models\ProgramOptionValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        // Get the current user's cart
        $cart = Cart::where('user_id', Auth::id())->with('Details.Program', 'Details.Options.OptionValue')->first();

        return view('user.modules.cart.index', compact('cart'));
    }

    public function add(Request $request, $program_id)
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        // Create a new cart detail for the selected program
        $detail = CartDetail::create([
            'cart_id' => $cart->id,
            'program_id' => $program_id,
            'quantity' => 1 // Set the quantity field explicitly
        ]);

        // If the program has options, add them to the cart detail
        if ($request->has('options')) {
            foreach ($request->options as $option_id => $value) {
                $option = ProgramOption::findOrFail($option_id);
                $value_id = $value['value_id'];
                $value = ProgramOptionValue::findOrFail($value_id);

                CartDetailOptions::create([
                    'cart_detail_id' => $detail->id,
                    'program_option_id' => $option->id,
                    'option_value_id' => $value->id,
                    'quantity' => 1
                ]);
            }
        }

        return redirect()->route('cart.index')->with('success', 'Item added to cart successfully.');
    }


    public function remove($id)
    {
        // Find the cart detail and delete it
        CartDetail::where('id', $id)->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart successfully.');
    }

    public function update(Request $request, $id)
    {
        // Find the cart detail and update its quantity
        CartDetail::where('id', $id)->update([
            'quantity' => $request->quantity
        ]);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

}
