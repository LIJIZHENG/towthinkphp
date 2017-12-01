<?php
namespace app\home\controller;
use think\Db;
use think\Request;

class Center extends Home{
    public function center(){
        return $this->fetch();
    }
    public function check(){
        if(!is_login()){
            return -1;
        }else{
            $member_id=is_login();
            $member = Db::table('ucenter_member')->where(['id'=>$member_id])->where(['status'=>2])->find();
            if(!empty($member)){
                return 0;
            }
        }
        return 1;
    }
    public function add(){
        $request = Request::instance();
        $post = $request->post();
        //自动验证
        $validate = validate('center');
        if (!$validate->check($post)){
            return $this->error($validate->getError());
        }
        $post['status']=1;
        $post['user_id']=is_login();
        $center=new\app\home\model\Center();
        $result=$center->save($post);
        if ($result){
            $this->success('申请成功');
        }else{
            $this->success('申请失败');
        }
    }
}