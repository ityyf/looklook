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

<body>

<div id="header">
		<div class="wrap">
			<div class="logo"><a href="http://www.17sucai.com/" title="uthml酷站大全"><img src="css/logo.png" /></a></div>
</div>
<div id="container">
		<div id="sort">
			<table width="100%" border="0" cellspacing="0">
				<tr>
					<td class="sort_left">
						<div class="sort_cate">
							<div class="sort_b"><a href="{{url('/')}}" onclick="return false;"><div class="sort_b_inner"><i class="cate_default"></i><span>全部</span><div class="clear"></div></div></a></div>
						</div>
					</td>
					<td>
						<div class="sort_sort">
							<div class="sort_b"><a href="{{url('/')}}?orderby=time" onclick="return false;"><div class="sort_b_inner"><i class="cate_sort"></i><span>最新发布</span><div class="clear"></div></div></a></div>
						</div>
					</td>
					<td class="sort_right">
						<div class="sort_tag">
							<div class="sort_b"><a href="{{url('/')}}?orderby=time" onclick="return false;"><div class="sort_b_inner"><i class="cate_tag"></i><span>版权</span><div class="clear"></div></div></a></div>
						</div>
					</td>
				</tr>
			</table>
		</div>
		</div>>


		<ul>
			<li class="nav_index menu_cur"><a href="{{url('/')}}"><i></i><span>首页</span><b></b><div class="clear"></div></a></li>
			<li class="nav_site"><a href="index.html"><i></i><span>设计师</span><b></b><div class="clear"></div></a></li>
			<li class="nav_help"><a href="index.html"><i></i><span>帮帮忙</span><b></b><div class="clear"></div></a></li>
			<li class="nav_site"><a href="{{url("center")}}"><i></i><span>个人中心</span><b></b><div class="clear"></div></a></li>
		</ul>
	</div>

	<div id="sort_content">
		<div class="asort">
			<div class="hd">
				<div class="wrap">
					<div class="fl"><span>选择分类</span><div class="clear"></div></div>
					<div class="fr"></div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="ct">
				<div class="wrap">
					<ul class="choose_cate">

													<li style="font-weight:700;" c_data="1" style="background:#f7f7f7;"><i style="margin-right:0;background:none;width:0;" class="s"></i><a class='a_type' href='{{url('/')}}'>全部分类</a><i class="e"></i></li>
															@foreach($type as $key=>$val)
															<li c_data="27"><i style="background:none;width:10px;margin-right:0;" class="s" ></i><a class='a_type' href="{{url('/')}}"><?php  echo $val['type_name']?></a><i class="e"></i></li>
															@endforeach
					</ul>
					<div class="clear"></div>
				</div>
			</div>
		</div>

		<div class="asort">
			<div class="hd">
				<div class="wrap">
					<div class="fl"><span>选择排序</span><div class="clear"></div></div>
					<div class="fr"></div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="ct">
				<div class="wrap">
					<ul class="choose_sort">
													<li s_data="like"><i class="s"></i><a href="{{url('/')}}" class='a_type'>最多喜欢</a><i class="e"></i></li>
													<li s_data="view"><i class="s"></i><a class='a_type' href="{{url('/')}}" >最多浏览</a><i class="e"></i></li>
													<li s_data="comment"><i class="s"></i><a class='a_type' href="{{url('/')}}">最多评论</a><i class="e"></i></li>
													<li s_data="laster"><i class="s"></i><a class='a_type' href="{{url('/')}}">最新发布</a><i class="e"></i></li>
											</ul>
					<div class="clear"></div>
				</div>
			</div>
		</div>

		<div class="asort">
			<div class="hd">
				<div class="wrap">
					<div class="fl"><i></i><span>版权</span><div class="clear"></div></div>
					<div class="fr"></div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="ct">
				<div class="wrap">
					<!--<h4 class="cate_trade"><i></i><span>行业</span></h4>-->
					<ul>
												<li t_data=""><i></i><span>所有者</span><i class="e"></i></li>
												<li t_data="1"><i></i><span>原创</span><i class="e"></i></li>
												<li t_data="2"><i></i><span>转载</span><i class="e"></i></li>
											</ul>
					<div class="clear"></div>
				</div>
			</div>
		</div>

	</div>
<form method="post" action="{{('login')}}">
    <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">
<div class="login_b_i">
<div class="login_input">
<div class="login_user"><input type="text" name="user_email" placeholder="邮箱/帐号" /><i></i></div>
<div class="login_user"><input type="password" name="user_pwd" placeholder="密码" /><i></i></div>
</div>
</div>
<input type="submit" value="登录" class="login_submit">
</form>
</body>
<script language="javascript" src="js/zepto.min.js"></script>
<!-- <script language="javascript" src="js/fx.js"></script> -->
<script language="javascript" src="js/script.js"></script>
<script language="javascript" src="js/jquery.lazyload.js"></script>
<script src="dist/dropload.min.js"></script>
</html>