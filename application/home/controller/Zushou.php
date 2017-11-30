<?php
namespace app\home\controller;
use app\home\model\Document;

class Zushou extends Home{
  //小区出售
    public function zushou(){
        $docment = new Document();
        $lists = $docment->lists(46);
        $this->assign('lists',$lists);//列表
        return $this->fetch();
    }
}