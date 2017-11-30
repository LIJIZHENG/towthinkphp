<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.twothink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 艺品网络
// +----------------------------------------------------------------------
namespace app\admin\model;
use think\Model;

/**
 * 报修模型
 */
class Repairs extends Model{
    protected $auto = ['name','tel','title','content','address'];
    protected $insert = ['status'=>1];
    protected $rule = [
        'name'=>'require|max:25|token',
        'tel'=>'require|max:11|min:11',
        'status'=>'require',
        'title'=>'require',
        'content'=>'require',
        'address'=>'require',
    ];
    protected $message = [
        'name.require' => '姓名必须',
        'tel.min' => "电话号码不合法",
        'tel.max' => "电话号码不合法",
        'title.require'   => '标志必须填',
        'content.require'  => '内容必须填',
        'address.require'        => '地址必须填',
    ];
}

