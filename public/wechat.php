<?php
$postXML = file_get_contents('php://input');
file_put_contents('data.xml',$postXML);
$xml = simplexml_load_string($postXML);
$data = [];
foreach ($xml as $k=>$v){
    $data[$k]=(string)$v;
}
extract($data);
$simpleXML = simplexml_load_file('http://flash.weather.com.cn/wmaps/xml/sichuan.xml ');
$data = [];
foreach ($simpleXML->children() as $k=>$v){
    if ((string)$v['cityname'] == $Content){
        foreach ($v->attributes() as $key=>$values){
            $data[$key]=(string)$values;
        }
    }
}
if ($data == null){
    $str = "该城市不存在";
}else{
    $str = "城　市:".$data['cityname']."天　气:".$data['stateDetailed']."最低气温:".$data['tem1']."最高气温:".$data['tem2'];
}
require "./xml.xml";