<?php
/**
 * Created by PhpStorm.
 * User: yanglinkai
 * Date: 13/05/2018
 * Time: 16:43
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Spatie\Browsershot\Browsershot;


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
    public function htmlToJpg() {
        $newsUrl = 'https://www.baidu.com';

        Browsershot::url($newsUrl)
//            ->setNodeBinary('/home/laradock/.nvm/versions/node/v8.9.4/bin/node')
//            ->setNpmBinary('/home/laradock/.nvm/versions/node/v8.9.4/bin/npm')
            ->windowSize(480, 800)
            ->userAgent('Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Mobile Safari/537.36')
            ->mobile()
            ->touch()
            ->setDelay(1000)
            ->save(public_path('images/toutiao.jpg'));
        echo 2;exit;
    }
    public function htmlToJpgByPantomjs() {
        exec('whoami', $log);
//        exec('/home/laradock/.nvm/versions/node/v8.9.4/bin/phantomjs /var/www/public/abc.js', $log);
//        exec('node /var/www/public/abc.js', $log);
//        exec('cat /etc/passwd', $log);
//        exec('sudo node -v', $log);
//        exec('curl http://kl.ylkget.com/api/users', $log);
//        exec('which curl', $log);
//        exec('curl http://dockerhost', $log);
//        exec('curl http://wxnode.ylkget.cn:7001/', $log);
        var_dump($log);
        echo 22233;
        exit;
    }
    public function toEgg() {
//        $res = file_get_contents('http://kl.ylkget.com/api/users/session');
        $res = file_get_contents('http://egg:7001/');
        echo $res;
        exit;
    }

}