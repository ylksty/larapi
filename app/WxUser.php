<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WxUser extends Model
{
    //
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
//    protected $table = 'wx_jjds_users';

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['openid', 'session_key'];
}
