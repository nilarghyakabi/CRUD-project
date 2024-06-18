<?php

namespace App\Http\Controllers;
use App\Models\cart;
use App\Http\Requests\CartRequest;
use Illuminate\Http\Request;
use Throwable;

class CartController extends Controller
{
    public function index()
    {
        return view('');
    }

    public function form(Request $request)
    {
        return view('cart.form');
    }

    public function save(CartRequest $request){
        try {
            cart::create(
                [
                    'user_id' => $request->user_id,
                    'cart_no' => $request->cart_no,
                    'sub_total' => $request->sub_total,
                    'discount' => $request->discount,
                    'total' => $request->total,
                    'status' => $request->status,
                ]);
        } catch(throwable $th){
            throw $th;
        }
       // dd($request->all());
        return redirect()->route('cart-form');
    }
}
