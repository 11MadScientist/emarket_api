<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserInfo as UserInfoResource;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userinfo = UserInfo::paginate(5);

        return UserInfoResource::collection($userinfo);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userinfo = $request->isMethod('put') ? UserInfo::findOrFail($request->id) : new UserInfo;

        $userinfo-> id           = $request->input('id');
        $userinfo-> firstname    = $request->input('firstname');
        $userinfo-> lastname     = $request->input('lastname');
        $userinfo-> password     = $request->input('password');
        $userinfo-> email        = $request->input('email');
        $userinfo-> phonenumber  = $request->input('phonenumber');
        $userinfo->address       = $request->input('address');
        $userinfo->usertype      = $request->input('usertype');

        if ($userinfo->save())
        {
            return new UserInfoResource($userinfo);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        $userinfo = DB::table('userinfo')->where('email', $email)->first();
        return new UserInfoResource($userinfo);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userinfo = UserInfo::findOrFail($id);

        if($userinfo->delete())
        {
            return new UserInfoResource($userinfo);
        }
        
    }
}
