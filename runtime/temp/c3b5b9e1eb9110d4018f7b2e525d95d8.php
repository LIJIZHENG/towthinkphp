<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\WWW\towthinkphp\public/../application/home/view/default/zushou\detail.html";i:1512055977;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="__STATIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="__STATIC__/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="index.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid">
        <div class="blank"></div>
        <?php if(!(empty($sale) || (($sale instanceof \think\Collection || $sale instanceof \think\Paginator ) && $sale->isEmpty()))): if(is_array($sale) || $sale instanceof \think\Collection || $sale instanceof \think\Paginator): $i = 0; $__LIST__ = $sale;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sale): $mod = ($i % 2 );++$i;?>
        <h3 class="noticeDetailTitle"><strong>套三<?php echo !empty($sale['type'])?"出租":"出售"; ?></strong></h3>
        <div class="noticeDetailInfo">发布者:<?php echo $sale['name']; ?>小区物管</div>
        <div class="noticeDetailInfo">发布时间：<?php echo time_format($sale['create_time']); ?></div>
        <div class="noticeDetailInfo">联系电话：<?php echo $sale['tel']; ?></div>
        <h4 class="text-danger">价格:<?php echo $sale['price']; ?>元/月</h4>
        <div class="noticeDetailContent">
            <img src="__ROOT__<?php echo get_cover_path($sale['logo']); ?>" />
        </div>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <td colspan="6" class="text-center">没有内容! </td>
        <?php endif; ?>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="__STATIC__/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>