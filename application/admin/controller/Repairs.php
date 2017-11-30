<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.twothink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 艺品网络
// +----------------------------------------------------------------------
namespace app\admin\controller;
use app\home\model\Repair;
use think\Db;

/**
 * 报修后台控制器
*/
class Repairs extends Admin{
    public function repairs(){
//      $pid = input('get.pid',0);
      /*获取频道列表*/
      $list = Db::name('Repairs')->where('status',1)->paginate(3);
//      $map = array('status'=>array('gt',-1),'pid'=>$pid);
//      $list =Repairs::where('status',1)->paginate(1);
//      $list=\think\Db::name('Repairs')->where($map)->order('sort asc','id asc')->select();
      $this->assign('list',$list);
//      $this->assign('pid',$pid);
        return $this->fetch();
//      return $this->fetch();
    }
    public function add()
    {
        $Repairs = model('repairs');
        if (request()->isPost()) {
            $post_data = \think\Request::instance()->post();
            $data = $Repairs->create($post_data);
            $validate = validate('Repairs');
            if(!$validate->check($data)){
                return $this->error($validate->getError());
            }

            if ($data) {
                $this->success('新增成功', url('repairs'));
                //记录行为
                action_log('update_repairs', 'repairs', $data->id, UID);
            } else {
                $this->error($Repairs->getError());
            }
        }else{
            $pid = input('pid',0);
            //获取父导航
            $this->assign('pid',$pid);
            $this->assign('info',null);
            return $this->fetch('add');
        }
        }
    public function del()
    {
        $id = array_unique((array)input('id/a', 0));

        if (empty($id)) {
            $this->error('请选择要操作的数据!');
        }
        $map = array('id' => array('in', $id));
        if (\think\Db::name('Repairs')->where($map)->delete()) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
    }