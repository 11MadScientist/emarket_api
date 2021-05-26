<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Http\Resources\Cart as CartResource;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('cart')
        ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = $request->isMethod('put') ? Cart::findOrFail($request->id) : new Cart;

        $cart-> id       = $request->input('id');
        $cart-> acc_id   = $request->input('acc_id');
        $cart-> store_id = $request->input('store_id');
        $cart-> prod_id  = $request->input('prod_id');
        $cart-> prod_qty = $request->input('prod_qty');
        $cart->prod_price= $request->input('prod_price');
        $cart-> total    = $request->input('total');

        if ($cart->save())
        {
            return new CartResource($cart);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($acc_id)
    {
        $cart = DB::table('cart')
        ->where('acc_id', '=', $acc_id)
        ->get();
        return $cart;
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeCart($id)
    {
        $cart = DB::table('cart')->where('id','=', $id)->delete();
        return $cart;
    }

    public function destroy($id)
    {
        $cart = DB::table('cart')->where('acc_id','=', $id)->delete();
        return $cart;
    }
}
