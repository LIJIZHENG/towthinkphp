<?php
namespace app\common\validate;
use think\Validate;

class Center extends Validate{
    protected $rule = [
        'name'=> 'require|max:25',
        'tel'=> 'require|max:11|min:11',
        'idcard'=> 'require',
        'relation'=> 'require',
        'room_no'=> 'require',
    ];
    protected $message = [
        'name.require' => "姓名不能为空",
        'name.max' => "姓名最大为25个字符",
        'tel.min' => "电话号码不合法",
        'tel.max' => "电话号码不合法",
        'room_no' => "房号不能为空",
        'relation' => "你与业主的关系不能为空",
        'idcard' => "你的身份证号不能为空",
    ];
}