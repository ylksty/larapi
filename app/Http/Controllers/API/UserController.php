<?php

namespace App\Http\Controllers\API;

use App\WxUser as User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Iwanli\Wxxcx\Wxxcx;

class UserController extends Controller
{
    public function login(Wxxcx $wxxcx)
    {
        $code = request('code', '');
        $userInfo = $wxxcx->getLoginInfo($code);
        die(json_encode(array(
            'code'  => 200,
            'data'  => $userInfo
        )));
        print_r($userInfo);
        echo 'login';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'index';
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //
        $data = $request->post('data');
//        print_r(json_decode($data));

        die(json_encode(array(
            'code'  => 200,
            'data'  => true
        )));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        echo 'show';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
