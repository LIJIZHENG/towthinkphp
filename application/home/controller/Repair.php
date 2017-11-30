<?php
namespace app\home\controller;
class Repair extends Home {
    public function index(){
        $lists=\think\Db::name('Repair')->paginate(10);
        $this->assign('lists',$lists);
        $page = $lists->render();
        $this->assign('page',$page);
        return $this->fetch();
    }
    public function repair(){
        $pid = input('get.pid',0);
        /*获取频道列表*/
        $map = array('status'=>array('gt',-1),'pid'=>$pid);
        $list=\think\Db::table('Repair')->where($map)->order('sort asc','id asc')->select();
        $this->assign('list',$list);
        $this->assign('pid',$pid);
        return $this->fetch();
    }
    public function add()
    {
        if (request()->isPost()) {
            $Repairs = model('repair');
            $post_data = \think\Request::instance()->post();
            $data = $Repairs->create($post_data);
            if ($data) {
                $this->success('新增成功', url('repair'));
                //记录行为
                action_log('update_repair', 'repair', $data->id, UID);
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
        if (\think\Db::name('Repair')->where($map)->delete()) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
    //修改状态
    public function edit(){
        $id = input('id/a',0);
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        if(\think\Db::table('Repair')->update(['status' => '1','id'=>$id[0]])){
            $this->success('处理成功');
        } else {
            $this->error('处理失败！');
        }
    }
}