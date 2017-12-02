<?php
namespace app\home\controller;
class Wechat extends Center{
    //获取用户openid
    public function info(){
        $appID='wx0160f586424189a1';
        //设置绝对路径
        $callback_url=url('home/wechat/callback','',true,true);
        //引到用户打开如下页面
        //https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE#wechat_redirect
        $url="https://open.weixin.qq.com/connect/oauth2/authorize?"."appid={$appID}&redirect_uri={$callback_url}&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect";
    }
    //授权成功回调页
    public  function callback(){
        echo'callback';
    }

}