<?php
/**
 * Created by PhpStorm.
 * User: xieguangming
 * Date: 2017/11/30
 * Time: 16:33
 */

namespace app\home\controller;


use think\Db;

class Zushou extends Home
{
    //小区租售列表
    public function zushou(){
        $rent = Db::name('Zushou')->where(['type'=>1])->select();
        $sell = Db::name('Zushou')->where(['type'=>0])->select();
        $this->assign('rent',$rent);//列表
        $this->assign('sell',$sell);//列表
        return $this->fetch();
    }
    //小区租售详情
    public function detail($id = 0 ){
        /* 标识正确性检测 */
        if(!($id && is_numeric($id))){
            $this->error('文档ID错误！');
        }
        /* 获取详细信息 */
        $info = Db::name('Zushou')->where(['id'=>$id])->select();
        /* 模板赋值并渲染模板 */
        $this->assign('zushou', $info);
//        var_dump($info);exit;/
        return $this->fetch();
    }
}