<?php
namespace app\home\controller;
class My extends Home{
    public function my(){
        return $this->fetch();
    }
}