<?php
namespace app\home\controller;

use app\home\model\Document;
use think\Db;

class Notice extends Home
{
    //小区通知列表
    public function notice(){
        $document = new Document();
        $lists = $document->lists(44);
        $this->assign('lists',$lists);//列表
        return $this->fetch();
    }
    //ajax
    public function ajax($page){
        $document = new Document();
        $page = ($page-1)*2;
        $list = $document->lists(44,$page);
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
}