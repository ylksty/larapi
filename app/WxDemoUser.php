<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\WxUser;

class WxDemoUser extends Model implements WxUser
{
    //
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'wx_demo_users';

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['openid', 'session_key'];
}
