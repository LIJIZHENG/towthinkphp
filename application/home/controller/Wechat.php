<?php
/**
 * Created by PhpStorm.
 * User: xieguangming
 * Date: 2017/12/1
 * Time: 15:03
 */

namespace app\home\controller;

use think\Controller;
use think\Session;

class Wechat extends Controller
{
    public function info(){
        Session::get('return_rul',url('home/wechat/info'));
        if (!Session::has('openid')){
            $appID = "wx0160f586424189a1";
            $callback_url = url('home/wechat/callback','',true,true);
            $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appID}&redirect_uri={$callback_url}&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect";
            $this->redirect($url);
        }else{
            $openid = Session::get('openid');
        }
    }
    //回调页
    public function callback(){
        $appID = "wx0160f586424189a1";
        $secret = "254a1fe1c2ec600171ae5ab33739dbb3";
        $code = request()->get('code');
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appID}&secret={$secret}&code={$code}&grant_type=authorization_code";
        $str = file_get_contents($url);
        $json = json_decode($str);
        $openid = $json->openid;
        Session::set('openid',$openid);
        if (Session::has('return_url')){
            $this->redirect(Session::get('return_url'));
        }
    }
}