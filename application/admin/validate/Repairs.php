<?php
namespace app\common\validate;
use think\Validate;

class Repairs extends Validate{
    protected $rule = [
        'name'=> 'require|max:25',
        'tel'=> 'require|max:11|min:11',
        'title'=>'require',
        'content'=>'require',
        'address'=>'require',
    ];
    protected $message = [
        'name.require' => "姓名不能为空",
        'name.max' => "姓名最大为25个字符",
        'tel.min' => "电话号码不合法",
        'tel.max' => "电话号码不合法",
        'address' => "地址不能为空",
        'title' => "标题不能为空",
        'content' => "内容不能为空",
    ];
}