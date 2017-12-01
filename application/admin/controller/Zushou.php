<?php
/**
 * Created by PhpStorm.
 * User: xieguangming
 * Date: 2017/11/30
 * Time: 14:43
 */

namespace app\admin\controller;


class Zushou extends Admin
{
    //小区租售
    public function zushou(){
        $pid = input('get.pid', 0);
        $list = \think\Db::name('Zushou')->select();
        $this->assign('list', $list);
        $this->assign('pid', $pid);
        $this->assign('meta_title' , '小区租售');
        return $this->fetch();
    }
    //添加小区租售
    public function add(){
        if(request()->isPost()){
            $Channel = model('Zushou');
            $post_data=\think\Request::instance()->post();
            //自动验证
            $validate = validate('Zushou');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }

            $data = $Channel->create($post_data);
            if($data){
                $this->success('新增成功', url('zushou'));
            } else {
                $this->error($Channel->getError());
            }
        } else {
            $pid = input('pid', 0);
            //获取父导航
            if(!empty($pid)){
                $parent = \think\Db::name('Zushou')->where(array('id'=>$pid))->field('title')->find();
                $this->assign('parent', $parent);
            }

            $this->assign('pid', $pid);
            $this->assign('info',null);
            $this->assign('meta_title', '新增租售');
            return $this->fetch('add');
        }
    }
    //修改小区租售
    public function edit($id = 0){
        if($this->request->isPost()){
            $postdata = \think\Request::instance()->post();
            $Channel = \think\Db::name("Zushou");
            $data = $Channel->update($postdata);
            if($data !== false){
                $this->success('编辑成功', url('index'));
            } else {
                $this->error('编辑失败');
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = \think\Db::name('Zushou')->find($id);

            if(false === $info){
                $this->error('获取配置信息错误');
            }

            $pid = input('get.pid', 0);
            //获取父导航
            if(!empty($pid)){
                $parent = \think\Db::name('Zushou')->where(array('id'=>$pid))->field('title')->find();
                $this->assign('parent', $parent);
            }

            $this->assign('pid', $pid);
            $this->assign('info', $info);
            $this->meta_title = '编辑小区租售';
            return $this->fetch('add');
        }
    }
    //删除小区租售
    public function del(){
        $id = array_unique((array)input('id/a',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(\think\Db::name('Zushou')->where($map)->delete()){
            //记录行为
            action_log('update_channel', 'Zushou', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
}