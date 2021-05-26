<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyTransactions;
use App\Http\Resources\MyTransactions as MyTransactionsResource;
use Illuminate\Support\Facades\DB;

class MyTransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($acc_id)
    {
        $mytransactions = DB::table('mytransactions')
        ->where("acc_id", '=', $acc_id)
        ->get();
        return $mytransactions;
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mytransactions = $request->isMethod('put') ? MyTransactions::findOrFail($request->id) : new MyTransactions;

        $mytransactions-> id                 = $request->input('id');
        $mytransactions-> acc_id             = $request->input('acc_id');
        $mytransactions-> grand_total        = $request->input('grand_total');
        $mytransactions-> payment_mode       = $request->input('payment_mode');
        $mytransactions-> transaction_status = $request->input('transaction_status');

        if ($mytransactions->save())
        {
            $mytransactions = new MyTransactionsResource($mytransactions);
            return $mytransactions;
        }
    }

    public function show($user_id)
    {
        
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
    public function deleteTransaction($id)
    {
        $transaction = DB::table('myTransactions')->where('id','=', $id)->delete();

        $order = DB::table('order')->where('transaction_id','=', $id)->delete();
        return $order;
    }

}
