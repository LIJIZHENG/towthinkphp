<?php
namespace app\home\controller;
use app\home\model\Document;
use think\Db;

class Plot extends Home{
    //小区活动列表
    public function plot(){
    $docment = new Document();
    $lists = $docment->lists(48);
    $this->assign('lists',$lists);//列表
    return $this->fetch();
    }
    //ajax翻页
    public function ajax($page){
    $document = new Document();
    $page = ($page-1)*2;
    $list = $document->lists(48,$page);
    if($list){
    $html='';
    foreach ($list as $v){
        $img = Db::name('picture')->where('id',$v['cover_id'])->select();
        $img[0]['path']=  $img[0]['path']?$img[0]['path']:'/public/static/static/nopic.jpg';
        $html.=  '<div class="container-fluid" id="2">
    <div class="row noticeList">
    <a href="/home/article/detail/id/'.$v['id'].'.html">
    <div class="col-xs-2">
        <img class="noticeImg" src="'.$img[0]['path'].'"  style="width: 150px"/>
    </div>
    <div class="col-xs-10">
        <p class="title">'.$v['title'].'</p>
        <p class="intro">'.$v['description'].'</p>
        <p class="info">浏览: '.$v['view'].' <span class="pull-right">'.$v['create_time'].'</span> </p>
    </div>
    </a>
    </div>
    </div>';
    }
    return $html;
    }else{
    return null;
    }
    }
    //文档模型详情页
    public function detail($id = 0, $p = 1){
    /* 标识正确性检测 */
    if(!($id && is_numeric($id))){
        $this->error('文档ID错误！');
    }

    /* 页码检测 */
    $p = intval($p);
    $p = empty($p) ? 1 : $p;

    /* 获取详细信息 */
    $Document = new Document();
    $info = $Document->detail($id);
    if(!$info){
        $this->error($Document->getError());
    }
    /* 分类信息 */
//        $category = $this->category($info['category_id']);
    /* 获取模板 */
    if(!empty($info['template'])){//已定制模板
        $tmpl = $info['template'];
    } elseif (!empty($category['template_detail'])){ //分类已定制模板
        $tmpl = $category['template_detail'];
    } else { //使用默认模板
        $tmpl = get_document_model($info['model_id'],'name') .'/detail';
    }
    /* 更新浏览数 */
    $map = array('id' => $id);
    $Document->where($map)->setInc('view');
    /* 模板赋值并渲染模板 */
//        $this->assign('category', $category);
    $this->assign('info', $info);
    $this->assign('page', $p); //页码
    return $this->fetch($tmpl);
}
    //参加活动
    public function join(){
         $member_id=is_login();
         $plot_id = input('plot_id');
         $data = ['member_id'=>$member_id,'plot_id'=>$plot_id];
         Db::table('member')->insert($data);
         return 1;
    }
}
return 0;