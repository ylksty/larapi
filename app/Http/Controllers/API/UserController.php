<?php

namespace App\Http\Controllers\API;

use App\WxUser as User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Wx\Wxapi;
use App\Contracts\WxUser;

class UserController extends Controller
{
    public function login(Request $request, Wxapi $wxapi, WxUser $user)
    {
        $code = $request->post('code');
        $type = $request->post('type');
        if (!$code || !$type) {
            return response()->json([
                'code'  => 201,
                'msg'   => '缺少必要参数code或type'
            ]);
        }
        $userInfo = $wxapi->getLoginInfo($code);
        if (isset($userInfo['errmsg'])) {
            return response()->json([
                'code'  => 201,
                'msg'   => $userInfo['errmsg']
            ]);
        } else {
            $oneUser = $user->updateOrCreate(
                ['openid' => $userInfo['openid']], ['session_key' => $userInfo['session_key']]
            );
            $request->session()->put([
                'type' => strtolower($type),
                'id' => strtolower($oneUser->id),
                'openid' => strtolower($oneUser->openid),
            ]);
            return response()->json([
                'code'  => 200,
                'data'  => $request->session()->getId()
            ]);
        }
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
    public function store(Request $request, Wxapi $wxapi, WxUser $user)
    {
        //
        $encryptedData = $request->post('encryptedData');
        $iv = $request->post('iv');

        $id = $request->session()->get('id');
        $oneUser = $user->find($id);
        $sessionKey = $oneUser->session_key;
        $userInfo = $wxapi->getUserInfoA($encryptedData, $iv, $sessionKey);
        $userInfo = json_decode($userInfo, true);
        $oneUser->nick_name = $userInfo['nickName'];
        $oneUser->avatar_url = $userInfo['avatarUrl'];
        $oneUser->gender = $userInfo['gender'];
        $oneUser->language = $userInfo['language'];
        $oneUser->city = $userInfo['city'];
        $oneUser->province = $userInfo['province'];
        $oneUser->country = $userInfo['country'];
        $oneUser->union_id = isset($userInfo['unionId']) ? $userInfo['unionId'] : '';
        $oneUser->save();

        return response()->json([
            'code'  => 200,
            'data'  => true
        ]);
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

    private function getModelByType($type) {
        $type = strtolower($type);
        $typeModel = [
            'demo'  => 'App\WxDemoUser'
        ];
        $modelString = isset($typeModel[$type]) ? $typeModel[$type] : '';
        return new $modelString();
    }
}
