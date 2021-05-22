<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoreInfo;
use App\Http\Resources\StoreInfo as StoreInfoResource;
use Illuminate\Support\Facades\DB;

class StoreInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $storeinfo = StoreInfo::paginate(5);
        
        return StoreInfoResource::collection($storeinfo);
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
        $storeinfo = $request->isMethod('put') ? StoreInfo::findorfail($request->id) : new StoreInfo;

        $storeinfo-> id              = $request->input('id');
        $storeinfo-> acc_id          = $request->input('acc_id');
        $storeinfo-> store_name      = $request->input('store_name');
        $storeinfo-> store_location  = $request->input('store_location');

        if($storeinfo->save())
        {
            return new StoreInfoResource($storeinfo);
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
        $storeinfo = DB::table('storeinfo')->where('acc_id', $acc_id)->first();
        return new StoreInfoResource($storeinfo);
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
