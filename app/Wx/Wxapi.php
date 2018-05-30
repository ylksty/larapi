<?php

namespace App\Wx;

use Iwanli\Wxxcx\Wxxcx;
use Iwanli\Wxxcx\WXBizDataCrypt;

class Wxapi extends Wxxcx
{
    private $errmsg = '';

    public function getLoginInfo ($code) {
        if ($this->checkType()) {
            return parent::getLoginInfo($code);
        } else {
            return ['errmsg' => $this->errmsg];
        }
    }

    public function getUserInfoA($encryptedData, $iv, $sessionKey) {
        if ($this->checkType()) {
            return $this->getUserInfos($encryptedData, $iv, $sessionKey);
        } else {
            return ['errmsg' => $this->errmsg];
        }
    }

    private function checkType() {
        if (!config('wxxcx.appid', '') || !config('wxxcx.secret', '')) {
            $this->errmsg = '参数type错误';
            return false;
        } else {
            return true;
        }
    }

    private function getUserInfoS($encryptedData, $iv, $sessionKey) {
        $pc = new WXBizDataCrypt(config('wxxcx.appid', ''), $sessionKey);
        $decodeData = "";
        $errCode = $pc->decryptData($encryptedData, $iv, $decodeData);
        if ($errCode !=0 ) {
            return [
                'code' => 10001,
                'message' => 'encryptedData 解密失败'
            ];
        }
        return $decodeData;
    }
}