<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Resources\Order as OrderResource;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getByTransaction($transaction_id)
    {
        $myorder = DB::table('order')
        ->where("acc_id", '=', $transaction_id)
        ->get();
        return $myorder;
    }

    public function getByStore($store_id)
    {
        return DB::table('order')
        ->join('storeinfo', 'storeinfo.id', 'order.store_id')
        ->select('order.id','order.acc_id','order.store_id', 'order.prod_id', 'order.quantity', 'order.prod_price', 
        'order.transaction_id', 'order.total', 'order.order_status')
        ->where('storeinfo.acc_id','=', $store_id)
        ->get();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $myroder = $request->isMethod('put') ? Order::findOrFail($request->id) : new Order;

        $myroder-> id                 = $request->input('id');
        $myroder-> acc_id             = $request->input('acc_id');
        $myroder-> store_id           = $request->input('store_id');
        $myroder-> prod_id            = $request->input('prod_id');
        $myroder-> quantity           = $request->input('quantity');
        $myroder-> prod_price        = $request->input('prod_price');
        $myroder-> transaction_id     = $request->input('transaction_id');
        $myroder-> total              = $request->input('total');
        $myroder-> order_status       = $request->input('order_status');

        if ($myroder->save())
        {
            return new OrderResource($myroder);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
