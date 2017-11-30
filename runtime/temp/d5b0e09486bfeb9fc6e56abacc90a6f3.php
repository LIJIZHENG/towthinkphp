<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\WWW\towthinkphp\public/../application/home/view/default/notice\index.html";i:1511918871;}*/ ?>
<link href="__STATIC__/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="__STATIC__/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="__STATIC__/bootstrap/css/docs.css" rel="stylesheet">
<link href="__STATIC__/bootstrap/css/twothink.css" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="__STATIC__/bootstrap/js/html5shiv.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="__STATIC__/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="__STATIC__/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>

<div class="span9">
    <!-- Contents
    ================================================== -->
    <section id="contents">

        <?php if(!(empty($lists) || (($lists instanceof \think\Collection || $lists instanceof \think\Paginator ) && $lists->isEmpty()))): if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$notice): $mod = ($i % 2 );++$i;?>
        <div class="row">
            <div class="span2 pull-left">
                <a href="<?php echo url('Article/detail?id='.$notice['id']); ?>">
                    <img class="img-responsive" src="__ROOT__<?php echo get_cover_path($notice['cover_id']); ?>" style="width: 150px"/>
                </a>
            </div>
            <div class="span7">
                <h3><a href="<?php echo url('Article/detail?id='.$notice['id']); ?>"><?php echo $notice['title']; ?></a></h3>
                <p class="lead"><?php echo $notice['description']; ?></p>
                <span><a href="<?php echo url('Article/detail?id='.$notice['id']); ?>">查看全文</a> ( 阅读：<?php echo $notice['view']; ?> )</span>
                <span class="pull-right">
                          <span class="author"><?php echo get_username($notice['uid']); ?></span>
                         <a href="<?php echo url('Article/lists?category='.get_category_name($notice['category_id'])); ?>"> <span><?php echo $notice['create_time']; ?></span></a>
            </div>
        </div>
        <hr/>
        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </section>
</div>
<!--<a href="javascript:;" id="">翻页</a>-->

<script type="text/javascript">
        $("#a").click(function(){
            console.debug("执行");
            $.getJSON("ajax",function (data) {
                $.each(data,function () {

                });
            });
        });


</script>
