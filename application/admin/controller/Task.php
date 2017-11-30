<?php
namespace app\admin\controller;
use think\Controller;

class Task extends Controller{
    public function test(){
       $param=request()->param();
       echo $param['id'];
    }
}