<?php
/**
 * Created by PhpStorm.
 * User: xieguangming
 * Date: 2017/11/30
 * Time: 21:56
 */

namespace app\admin\controller;


class Center extends Admin
{
    //认证列表
    public function center(){
        $list = \think\Db::name('Center')->select();
        foreach ($list as &$value){
            if($value['relation']==1){
                $value['relation']="本人";
            }elseif($value['relation']==2){
                $value['relation']="亲属";
            }else{
                $value['relation']="住户";
            }
        }
        $this->assign('list', $list);
        return $this->fetch();
    }

    //修改状态
    public function edit(){
        $id = input('id/a',0);
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        if(\think\Db::table('Center')->update(['status' => '0','id'=>$id[0]])){
            $this->success('处理成功');
        } else {
            $this->error('处理失败！');
        }
    }

    //删除
    public function del(){
        $id = array_unique((array)input('id/a',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(\think\Db::name('Center')->where($map)->delete()){
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
}