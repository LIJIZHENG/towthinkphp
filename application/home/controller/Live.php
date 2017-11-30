<?php
namespace app\home\controller;
class Live extends Home{
    //生活贴士
     public function live(){
         return $this->fetch();
     }
}