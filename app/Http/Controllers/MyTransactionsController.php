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
    public function index()
    {
        //
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
        $mytransactions = $request->isMethod('put') ? Cart::findOrFail($request->id) : new Cart;

        $mytransactions-> id                 = $request->input('id');
        $mytransactions-> acc_id             = $request->input('acc_id');
        $mytransactions-> store_id           = $request->input('store_id');
        $mytransactions-> prod_id            = $request->input('prod_id');
        $mytransactions-> prod_qty           = $request->input('prod_qty');
        $mytransactions-> transaction_status = $request->input('transaction_status');

        if ($mytransactions->save())
        {
            return new MyTransactionsResource($mytransactions);
        }
    }

    public function show($user_id)
    {
        $mytransactions = DB::table('mytransactions')
        ->where("acc_id", '=', $user_id)
        ->get();
        return MytransactionsResource::collection($mytransactions);
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
