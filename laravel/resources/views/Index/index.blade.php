<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="keywords" content="CSS酷站收录站 uehtml 网页设计 DIV+CSS Javascript 酷站 酷站收录 网站设计 网页设计 CSS3" />
<meta name="description" content="优艺客 设计师网站">
<meta name="author" content="优艺客" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
{{--<link rel="apple-touch-icon-precomposed" href="http://www.17sucai.com/static/images/favicon.ico">--}}
	<link rel="stylesheet" href="dist/dropload.css">
	<meta http-equiv="Access-Control-Allow-Origin" content="*">
<script>
var logined = 0
</script>
<title>看看吧</title>
<style>
	.a_type{
		color: black;
	}
	#pagination{
		height: 50px;
		margin: 20px 25.3% 0 28% ;
	}
	#pagination li{
		float: left;
		margin-right: 0px;
		width: 42%;
	}
#pagination li a{
	padding: 5px 10px;
	background: lightblue;
	border: 1px solid white;
	color: white;


}
#pagination li a:hover{
	text-decoration: none;
	color: white;
	background: black;
}


</style>
</head>

<body>
<script>
var now_page = 1,
search_value = '';
</script>
@include('Public.left')
<?php if(session('user_id')==''){ ?>
		<div id="user">
					<div class="account">
				<div class="login_b_t">
					<div class="pd10">
						<div class="fl">还没有账号<a id="reg_now" href="" onclick="return false;">立即注册</a></div><div class="fr"><a href="{{url('up_pwd')}}">忘记密码?</a></div><div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="pd10">
				@include('Public.login')
					<div class="login_quick">
						<p>用第三方帐号直接登录</p>
						<a href="http://www.17sucai.com/oauth/weibo/login" id="weibo_app"><span><i></i>微博帐号登录</span></a>
						<a href="http://www.17sucai.com/oauth/qq/login" id="qq_connect"><span><i></i>QQ&nbsp;&nbsp;帐号登录</span></a>
					</div>
			</div>
			</div>
<?php } ?>
	<div id="header">
		<div class="wrap">
			<i class="menu_open"></i>
			<div class="logo"><a href="#" title="uthml酷站大全"><img src="css/logo.png" /></a></div>
			<?php if(session('user_id')=='') {?>
			<i class="search_open"></i>
			<?php }?>
		</div>
		<div class="logo_msk"></div>
	</div>
	<div id="container">
		@include('Public.sort')
		<div id="content">
			<div id="lists" class="content">
			<ul >
				<input type="hidden" value="<?php echo $type_id ?>" id="hiddenType">
				@foreach($article as $key=>$val)
					<li class="lists" uid="<?php echo $val['article_id'] ?>">
						<div class="wrap">
							<a class="alist" href="{{url('/zhengwen')}}?article_id=<?=$val['article_id']?>">
								<div class="list_litpic fl"><img class="lazy" src="http://www.hanhaojie.cn/<?php echo $val['head_img'] ?>" /></div>
								<div class="list_info">
									<h4><?php  echo $val['article_name']?></h4>
									<h5><em>(<?php echo $val['type_name'] ?>)</em></h5>
									<div class="list_info_i">
										<dl class="list_info_views">
											<dt></dt>
											<dd><?php echo $val['page_views'] ?></dd>
											<div class="clear"></div>
										</dl>
										<dl class="list_info_comment">
											<dt></dt>
											<dd><?php echo $val['reply_num']; ?></dd>
											<div class="clear"></div>
										</dl>
										<dl class="list_info_like">
											<dt></dt>
											<dd><?php echo $val['like'] ?></dd>
											<div class="clear"></div>
										</dl>
										<div class="clear"></div>
									</div>
								</div>
								<div class="clear"></div>
							</a>
						</div>
					</li>
				@endforeach
			</ul>
				{{--<div class="list_loading"><i></i><span>努力加载中...</span></div>--}}
				<div id='pagination'>
					@include('pagination.default', ['paginator' => $article])
				</div>
			</div>
		</div>

		<div class="push_msk"></div>

	</div>

	<div id="sort_content">
		@include('Public.chooseType')
		@include('Public.chooseSort')
		@include('Public.chooseAbout')
	</div>

	<div id="newwrap_t" class="newwrap">
		<div class="newwrap_msk"></div>
		<iframe id="newwrap" frameborder="0" width="100%" height="100%"></iframe>
	</div>
	<div id="reg_index">
		<div class="reg_bar">
			<div class="wrap">
				<span class="fl"><i></i>注册帐号</span>
				<i class="reg_bar_close fr"></i>
				<div class="clear"></div>
			</div>
		</div>

		@include('Public.register')
	</div>
	<div class="loading_dark"></div>
	<div id="loading_mask">
		<div class="loading_mask">
			<ul class="anm">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
	</div>

<script language="javascript" src="js/zepto.min.js"></script>
<!-- <script language="javascript" src="js/fx.js"></script> -->
<script language="javascript" src="js/script.js"></script>
<script language="javascript" src="js/jquery.lazyload.js"></script>
<script src="dist/dropload.min.js"></script>
</body>
<script type="text/javascript"> 
   $(function() {
    $("img.lazy").lazyload({
        event : "sporty"
    });
});

$(window).bind("load", function() {
    var timeout = setTimeout(function() { $("img.lazy").trigger("sporty") }, 2000	);
});     
</script> 
</html>
