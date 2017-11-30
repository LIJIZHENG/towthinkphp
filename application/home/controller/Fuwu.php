<?php
namespace app\home\controller;
use app\home\model\Document;

class Fuwu extends Home{
    public function fuwu(){
        return $this->fetch();
    }
    public function my(){
        $docment = new Document();
        $lists = $docment->lists(52);
        $this->assign('lists',$lists);//列表
        return $this->fetch();
    }
}