<?php
/**
 * Created by PhpStorm.
 * User: yanglinkai
 * Date: 13/05/2018
 * Time: 16:43
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class HelpController extends Controller
{

    /**
     * HelpController constructor.
     */
    public function __construct()
    {
        $this->middleware('controller');
    }

    public function show() {
        echo env('DB_HOST', '127.0.0.1');
        echo config('env');
        echo config('wxxcx.appid', '');
        return view('help.show');
    }
    public function controller($id) {
        return view('help.controller', ['id' => $id]);
    }

}