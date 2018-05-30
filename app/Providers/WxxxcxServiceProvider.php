<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Wx\Wxapi;

class WxxxcxServiceProvider extends ServiceProvider
{
    /**
     * 标记着提供器是延迟加载的
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $type = strtolower(request('type', ''));

        $this->app->singleton('App\Wx\Wxapi', function ($app) use ($type) {
            if (!$type) {
                $type = session()->get('type');
            }
            if (!$type) {
                abort(401, 'type参数错误!');
            }
            if (in_array($type, ['demo'])) {
                config([
                    'wxxcx.appid' => config($type.'.appid', ''),
                    'wxxcx.secret' => config($type.'.secret', '')
                ]);
                return new Wxapi();
            } else {
                return new Wxapi();
            }
        });

        $this->app->singleton('App\Contracts\WxUser', function ($app) use ($type) {
            if (!$type) {
                $type = session()->get('type');
            }
            if (!$type) {
                abort(401, 'type参数错误!');
            }
            $typeModel = [
                'demo'  => 'App\WxDemoUser'
            ];
            $modelString = isset($typeModel[$type]) ? $typeModel[$type] : '';
            if ($modelString) {
                return new $modelString();
            } else {
                abort(401, '未找到用户model!');
            }
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
