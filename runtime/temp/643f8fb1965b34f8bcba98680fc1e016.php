<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"D:\WWW\towthinkphp\public/../application/home/view/default/repair\repair.html";i:1511770813;s:75:"D:\WWW\towthinkphp\public/../application/home/view/default/base\common.html";i:1496373782;s:72:"D:\WWW\towthinkphp\public/../application/home/view/default/base\var.html";i:1496373782;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo config('WEB_SITE_TITLE'); ?></title>
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
<!--<![endif]-->
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader'); ?>
</head>
<body>
	<!-- 头部 -->
	<!-- 导航条
	================================================== -->
	<div class="navbar navbar-inverse navbar-fixed-top">
	    <div class="navbar-inner">
	        <div class="container">
	            <a class="brand" href="<?php echo url('index/index'); ?>">TwoThink</a>
	            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <div class="nav-collapse collapse">
	                <ul class="nav"> 
		                <?php $__NAV__ = \think\Db::name('Channel')->field(true)->where("status=1")->order("sort")->select();if(is_array($__NAV__) || $__NAV__ instanceof \think\Collection || $__NAV__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;if($nav['pid'] == '0'): ?>
		                        <li>
		                            <a href="<?php echo get_nav_url($nav['url']); ?>" target="<?php if($nav['target'] == '1'): ?>_blank<?php else: ?>_self<?php endif; ?>"><?php echo $nav['title']; ?></a>
		                        </li>
                        	<?php endif; endforeach; endif; else: echo "" ;endif; ?> 
	                </ul>
	            </div>
	            <div class="nav-collapse collapse pull-right">
	                <?php if(is_login()): ?>
	                    <ul class="nav" style="margin-right:0">
	                        <li class="dropdown">
	                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-left:0;padding-right:0"><?php echo get_username(); ?> <b class="caret"></b></a>
	                            <ul class="dropdown-menu">
	                                <li><a href="<?php echo url('user/user/profile'); ?>">修改密码</a></li>
	                                <li><a href="<?php echo url('user/login/logout'); ?>">退出</a></li>
	                            </ul>
	                        </li>
	                    </ul>
	                <?php else: ?>
	                    <ul class="nav" style="margin-right:0">
	                        <li>
	                            <a href="<?php echo url('user/login/index'); ?>">登录</a>
	                        </li>
	                        <li>
	                            <a href="<?php echo url('user/user/register'); ?>" style="padding-left:0;padding-right:0">注册</a>
	                        </li>
	                    </ul>
	                <?php endif; ?>
	            </div>
	        </div>
	    </div>
	</div>

	<!-- /头部 -->
	
	<!-- 主体 -->
	
	<div id="main-container" class="container">
	    <div class="row">
	        
	        <!-- 左侧 nav
	        ================================================== -->
	            <div class="span3 bs-docs-sidebar">
	                
	                <ul class="nav nav-list bs-docs-sidenav">
	                   <?php echo widget('Category/lists', array($category['id'], request()->action() == 'index')); ?>
	                </ul>
	            </div>
	        
	        
<div class="main-title">
    <h2>前台报修管理</h2>
</div>

<div class="cf">
    <a class="btn" href="<?php echo url('add','pid='.$pid); ?>">新 增</a>
    <a class="btn" href="javascript:;">删 除</a>
    <button class="btn list_sort" url="<?php echo url('sort',array('pid'=>input('get.pid',0)),''); ?>">排序</button>
</div>

<div class="data-table table-striped">
    <table>
        <thead>
        <tr>
            <th class="row-selected">
                <input class="checkbox check-all" type="checkbox">
            </th>
            <th>ID</th>
            <th>报修人</th>
            <th>电话</th>
            <th>地址</th>
            <th>简述报修问题</th>
            <!--<th>保修时间</th>-->
            <th>内容</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$repais): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><input class="ids row-selected" type="checkbox" name="" id="" value="<?php echo $repairs['id']; ?>"> </td>
            <td><?php echo $repais['id']; ?></td>
            <td><?php echo $repais['name']; ?></td>
            <td><?php echo $repais['tel']; ?></td>
            <td><?php echo $repais['address']; ?></td>
            <td><a href="<?php echo url('index?pid='.$repairs['id']); ?>"><?php echo $repais['title']; ?></a></td>
            <!--<td><?php echo $repais['create_time']; ?></td>-->
            <td><?php echo $repais['content']; ?></td>
            <td><?php echo $repais['status']; ?></td>
            <td>
                <a class="confirm ajax-get" title="删除" href="<?php echo url('del?id='.$repais['id']); ?>">删除</a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <td colspan="6" class="text-center"> aOh! 暂时还没有内容! </td>
        <?php endif; ?>
        </tbody>
    </table>
</div>

	    </div>
	</div>

	<script type="text/javascript">
	    $(function(){
	        $(window).resize(function(){
	            $("#main-container").css("min-height", $(window).height() - 343);
	        }).resize();
	    })
	</script>
	<!-- /主体 -->

	<!-- 底部 -->
	
    <!-- 底部
    ================================================== -->
    <footer class="footer">
      <div class="container">
          <p> 本站由 <strong><a href="http://www.twothink.cn" target="_blank">TwoThink</a></strong> 强力驱动</p>
      </div>
    </footer>

	<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "__ROOT__", //当前网站地址
		"APP"    : "__APP__", //当前项目地址
		"PUBLIC" : "__PUBLIC__", //项目公共目录地址
		"DEEP"   : "<?php echo config('URL_PATHINFO_DEPR'); ?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo config('URL_MODEL'); ?>", "<?php echo config('URL_CASE_INSENSITIVE'); ?>", "<?php echo config('URL_HTML_SUFFIX'); ?>"],
		"VAR"    : ["<?php echo config('VAR_MODULE'); ?>", "<?php echo config('VAR_CONTROLLER'); ?>", "<?php echo config('VAR_ACTION'); ?>"]
	}
})();
</script>
	
<script type="text/javascript">
    $(function() {
        //点击排序
        $('.list_sort').click(function(){
            var url = $(this).attr('url');
            var ids = $('.ids:checked');
            var param = '';
            if(ids.length > 0){
                var str = new Array();
                ids.each(function(){
                    str.push($(this).val());
                });
                param = str.join(',');
            }

            if(url != undefined && url != ''){
                window.location.href = url + '/ids/' + param;
            }
        });
    });
</script>
<script>nextHref = $("#next_page a").attr("href");
// 给浏览器窗口绑定 scroll 事件
$(window).bind("scroll",function(){
    // 判断窗口的滚动条是否接近页面底部
    if( $(document).scrollTop() + $(window).height() > $(document).height() - 10 ) {
        // 判断下一页链接是否为空
        if( nextHref != undefined ) {
            // 显示正在加载模块
            $("#page_loading").show("slow");
            // Ajax 翻页
            $.ajax( {
                url: $("#page_nav a").attr("href"),
                type: "POST",
                success: function(data) {
                    result = $(data).find("#thumbs .imgbox");
                    nextHref = $(data).find("#page_nav a").attr("href");
                    $("#page_nav a").attr("href", nextHref);
                    $("#thumbs").append(result);
                    // 把新的内容设置为透明
                    $newElems = result.css({ opacity: 0 });
                    $newElems.imagesLoaded(function(){
                        $container.masonry( 'appended', $newElems, true );
                        // 渐显新的内容
                        $newElems.animate({ opacity: 1 });
                        // 隐藏正在加载模块
                        $("#page_loading").hide("slow");
                    });

                }
            });
        } else {
            $("#page_loading span").text("木有了噢，最后一页了！");
            $("#page_loading").show("fast");
            setTimeout("$('#page_loading').hide()",1000);
            setTimeout("$('#page_loading').remove()",1100);
        }
    }
});</script>
 <!-- 用于加载js代码 -->
	<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
	<?php echo hook('pageFooter', 'widget'); ?>
	<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
		
	</div>

	<!-- /底部 -->
</body>
</html>
