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
	<link rel="apple-touch-icon-precomposed" href="http://www.17sucai.com/static/images/favicon.ico">
	<script>	
		var logined = 0
	</script>
	<title>看看吧 看看文章</title>
</head>

<body>


<div id="header" class="head">
	<div class="wrap">
		<i class="menu_back"><a onclick="history.back(-1)"></a></i>
		<div class="title">
			<span class="title_d"><p>看看吧 看看文章</p></span>
			<div class="clear"></div>
		</div>
		<i class="menu_share"></i>
	</div>
</div>

<div id="container">
	<div id="content">

		<div style="height:1px"></div>

		<div id="works">
			<div class="pd5">

				<div class="list_info_i" style="margin-top:5px;">
					<dl class="list_info_views">
						<dt></dt>
						<dd><?=$article['page_views']?></dd>
						<div class="clear"></div>
					</dl>
					<dl class="list_info_comment">
						<dt></dt>
						<dd><?=$reply_num?></dd>
						<div class="clear"></div>
					</dl>
					<dl class="list_info_like">
						<dt></dt>
						<dd id="like_top"><?=$article['like']?></dd>
						<div class="clear"></div>
					</dl>
					<dl class="works_view">
						<dt></dt>
						<dd><?=$article['publish_time']?></dd>
						<div class="clear"></div>
					</dl>
					<div class="clear"></div>
				</div>

				{{--文章标题--}}
				<div class="clear">
					<h3 style="text-align: center;"><?=$article['article_name']?></h3>
					<input type="hidden" id="article_id" value="<?=$article['article_id']?>">
					<input type="hidden" id="author_id" value="<?=$article['author_id']?>">
					<br>
					<span style="float:right;">来自:<?=$article['author_info']['user_email']?></span><br><br>
					<span style="float:right;"><a style="color:blue;cursor:pointer;" id="collect" status="<?php echo $status ?>"><?php if($status==1){echo "
					取消收藏";}else{echo "收藏文章";} ?></a> | <a style="color:blue;cursor:pointer;" id="attentd" status="0">关注作者</a></span><br><br>
				</div>
				<div class="article_ct">
					<p>
						{{--<img src="images/1421906192522_1140x0.jpg" />--}}
					</p>
					<?php echo htmlspecialchars_decode($article['article_content']); ?>
				</div>
				<div class="clear"></div>
				<h2 style="float: right"><button  id="report" style="color:blue;cursor:pointer;"  article_id="<?=$article['article_id']?>">举报该文章</button></h2>

			</div>
		</div>
		<div id="more_about">
			<h4>相关文章</h4>
			<div class="more_about">
				<table width="100%" border="0" cellspacing="5">
					<tr>
						<td><a target="_blank" href="#"><img src="images/142013403687.gif" /></a></td>
						<td><a target="_blank" href="#"><img src="images/1417593165541.png" /></a></td>
						<td><a target="_blank" href="#"><img src="images/1416412664171.png" /></a></td>
						<td><a target="_blank" href="#"><img src="images/142013403687.gif" /></a></td>
						<td><a target="_blank" href="#"><img src="images/1417593165541.png" /></a></td>
						<td><a target="_blank" href="#"><img src="images/1416412664171.png" /></a></td>
					</tr>
				</table>
			</div>
		</div>

		<div id="comment">
			<div class="comment_other">
				<h4>全部评论: <?=$reply_num?>条</h4>
			</div>
			<ul>
				<?=$str?>
				<?php foreach($reply as $k=>$v):?>
				<li postdata="17263" usdata="3984">
					<div class="pd5">
						<a class="avt fl" href="{{url('user_info')}}?user_id=<?=$v['user_id'] ?>">
							<img src="http://www.hanhaojie.cn/<?=$v['user_photo']?>" alt="头像" height="30px;"/>
						</a>
						<div class="comment_content">
							<h5>
								<div class="fl">
									<a class="comment_name" href="{{url('user_info')}}?user_id=<?=$v['user_id'] ?>" user_id="<?=$v['user_id']?>"><?=$v['user_email']?></a>
									<span><?=$v['addtime']?></span>
								</div>
								<div class="reply" reply_idorparent="<?=$v['reply_id']?>" reply_ort="1">[回复]</div>
								<div class="clear"></div>
							</h5>
							<div class="comment_p">
								<div class="comment_pct"><?=$v['reply_content']?></div>
								<div class="quote">
									<?php foreach($v['son'] as $kk=>$vv){echo htmlspecialchars_decode($vv['reply_content'])."<br>";}?>
								</div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="comment_reply"></div>
					</div>
				</li>
				<?php endforeach;?>

			</ul>

			<div class="pd5">
			</div>
		</div>
	</div>

</div>
<style>
	.reply{
		color:#ff8a00;
		font-size:12px;
		height:20px;
		float: right;
		cursor: pointer;
	}
	.reply_content{
		margin-left: 20px;
		color: red;
	}
	#comment{
		margin-bottom: 50px;
	}
	#like_button{
		cursor: pointer;
	}
</style>


{{--中间按钮弹出层--}}
<div id="us_panel_menu">
	<div class="us_panel_msk"></div>
	<div class="us_panel_menu_t">
		<table width="100%" cellspacing="0">
			<tr>
				<td valign="top" class="us_panel_menu_index">
					<a href="{{url('/')}}"><i></i><span>首页</span></a>
				</td>
				<td valign="top" class="us_panel_menu_designer">
					<a href="{{url('center')}}"><i></i><span>个人中心</span></a>
				</td>
				<td valign="top" class="us_panel_menu_help">
					<a href="{{url('help_show')}}"><i></i><span>帮帮忙</span></a>
				</td>
				<td valign="top" class="us_panel_menu_about">
					<a href="{{url('about')}}"><i></i><span>关于</span></a>
				</td>
			</tr>
		</table>
	</div>
</div>

{{--下方三个按钮--}}
<div id="us_panel2">
	<table width="100%" height="100%" cellspacing="0" border="0">
		<tr>
			<td id="like_button" isclick="0"><i></i><span>点赞(<em><?=$article['like']?></em>)</span></td>
			<td class="us_panel_menu">
				<div class="arrow_top"></div>
				<i></i>
				<div class="us_panel_menu_left"></div>
				<div class="us_panel_menu_right"></div>
			</td>
			<td class="us_panel_post"><i></i><span>评论(<em><?=$reply_num?></em>)</span></td>
		</tr>
	</table>
</div>

{{--喜欢--}}
<div id="add_newpost">
	<div class="add_newpost">
		<table width="100%" height="100%" cellspacing="5">
			<tr>
				<td class="add_newpost_cancel">取消</td>
				<td class="add_newpost_post">确定</td>
			</tr>
		</table>
	</div>
	<div class="newpost_w">
		<div class="pd10">
			<div class="newpost_w_t">

			</div>
		</div>
	</div>
</div>


<div id="add_favorite">
	<div class="hd">
		<div class="wrap">
			<div class="fl">
				<span>喜欢的分类</span>
			</div>
			<div class="fr"></div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="ct">
		<div class="wrap">
			<div class="created_cate">
				<div class="created_cate_add">添加</div>
				<div class="created_cate_ipt">
					<input type="text" placeholder="创建分类" />
				</div>
				<div class="clear"></div>
			</div>
			<ul id="add_favorites_choose">

			</ul>
		</div>
	</div>
</div>

{{--分享--}}
@include('Public.share');

{{--评论/回复--}}
<div id="reg_index">
	{{--未登录状态--}}
	<?php if(session('user_id')=='') {?>
	<div class="reg_bar">
		<div class="wrap">
			<span class="fl"><i></i> <span id="reply_title">请先登录！</span> </span>
			<i class="reg_bar_close fr" onclick="clear_reply()"></i>
			<div class="clear"></div>
		</div>
	</div>
	<form method="post" action="{{('login')}}">
		<input type="hidden" name='location' id="location" value="<?=$article['article_id'] ?>">
		<input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">
		<div class="login_b_i">
			<div class="login_input">
				<div class="login_user"><input type="text" name="user_email" placeholder="邮箱/帐号" /><i></i></div>
				<div class="login_password"><input type="password" name="user_pwd" placeholder="密码" /><i></i></div>
			</div>
		</div>
		<input type="submit" value="登录" class="login_submit">
	</form>
	<?php }else{?>


	{{--登录状态--}}
	<div class="reg_bar">
		<div class="wrap">
			<span class="fl"><i></i> <span id="reply_title">发表评论</span> </span>
			<i class="reg_bar_close fr" onclick="clear_reply()"></i>
			<div class="clear"></div>
		</div>
	</div>
	<form method="post" action="">
		<div class="login_b_i">
			<div class="login_input">
				<textarea name="reply_content" id="" cols="30" rows="10" style="width: 100%;height: 100%;resize: none;" placeholder="畅所欲言，讲你想讲"></textarea>
				<input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">
				<input type="hidden" name="reply_user_id" id="reply_user_id">
				<input type="hidden" name="reply_user_name" id="reply_user_name">
				<input type="hidden" name="reply_idorparent" id="reply_idorparent">
				<input type="hidden" name="reply_ort" id="reply_ort">
			</div>
		</div>
		<button class="login_submit" id="login_submit">发表评论</button>
	</form>

	<?php } ?>



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
<input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">
<input type="hidden" id="user_id" value="<?php echo session('user_id'); ?>">

<script language="javascript" src="js/zepto.min.js"></script>
<script language="javascript" src="js/fx.js"></script>
<script language="javascript" src="js/script.js"></script>

<script>

	/**
	 * 举报文章
	 */

	$("#report").click(function () {
		var article_id=$(this).attr('article_id');
		var _this=$(this);
//		alert(article_id);return false;
		$.ajax({
			type: "get",
			url: "{{url('report')}}",
			data: {article_id:article_id},
			success: function(msg){
				_this.text('已举报');
				_this.attr('disabled','disabled');
			}
		});
	})



	/**
	 * 点击回复按钮
	 *     展示评论页面
	 */
	$(".reply").click(function(){

		var user_a_tag = $(this).parent().children(".fl").children("a").first();	//将要回复谁？
		var user_id = user_a_tag.attr("user_id");	//用户Id
		var user_name = user_a_tag.html();	//用户name
		var reply_ort = $(this).attr("reply_ort");	//评论等级 1:一级回复(入库) 2:二级回复(更新)
		var reply_idorparent = $(this).attr("reply_idorparent");	//是否为父类id 或为自增id

		//console.log(user_a_tag);//return false;

		$("#reply_title").html("回复"+user_name);
		$("#reply_user_id").val(user_id);
		$("#reply_user_name").val(user_name);
		$("#login_submit").html("发表回复");
		$("#reply_ort").val(reply_ort);
		$("#reply_idorparent").val(reply_idorparent);

		$("#reg_index").addClass("show");
	})

	//点击评论
	function clear_reply(){
		$("#reply_title").html("发表评论");
		$("#reply_user_id").val("");
		$("#reply_user_name").val("");
		$("#login_submit").html("发表评论");
	}


	//$("#add_newpost").addClass("show");
	/**
	 * 点击 喜欢 按钮
	 */
	$("#like_button").click(function () {
		var user_id=$('#user_id').val();
		if(user_id==''){
			$('#reg_index').addClass('show');
			return false;
		}
		var _this = $(this);
		var _token=$('#_token').val();
		var isclick = _this.attr("isclick");
		if(isclick == '1') {
			return false;
		}

		var article_id = $("#article_id").val();
		$.ajax({
			url:"user_like_article",
			type:"post",
			data:{article_id:article_id,_token:_token},
			success:function(msg){
				console.log(msg);
				if(msg == 1){
					var num = _this.children("span").children("em").html();
					_this.html("<i></i><span>已赞(<em>"+num+"</em>)</span>");
					_this.attr("isclick",'1');
					$("#like_top").html(num);
				}else if(msg == 0){
					var num = _this.children("span").children("em").html();
					num = parseInt(num)+1;
					_this.html("<i></i><span>已赞(<em>"+num+"</em>)</span>");
					$("#like_top").html(num);
					_this.attr("isclick",'1');
				}
			}
		})
	});

	/**
	 * 点击收藏文章
	 */
	$("#collect").click(function(){
		var user_id=$('#user_id').val();
		var status=$('#collect').attr('status');
		if(user_id==''){
			$('#reg_index').addClass('show');
			return false;
		}

		var article_id = $("#article_id").val();
		var _this = $(this);
		var _token=$('#_token').val();
		$.ajax({
			url:"collect",
			type:"post",
			data:{article_id:article_id,_token:_token,status:status},
			success:function(msg){
				if(status==1){
					if(msg==1){
						console.log("已取消收藏");
						_this.html("已取消收藏").css({color:"red"});
					}else{
						console.log("取消收藏失败");
						_this.html("取消收藏失败").css({color:"red"});
					}
					_this.attr("status",0);
				}else {
					if(msg==1){
						console.log("收藏成功");
						_this.html("收藏成功").css({color:"red"});
					}else{
						console.log("收藏失败");
						_this.html("收藏失败").css({color:"red"});
					}
					_this.attr("status",1);
				}
			}})
	});

	/**
	 *	点击关注作者
	 */
	$('#attentd').click(function(){
		var user_id=$('#user_id').val();
		if(user_id==''){
			$('#reg_index').addClass('show');
			return false;
		}
		var author_id = $("#author_id").val();
		var _this = $(this);
		var _token=$('#_token').val();
		var status = _this.attr("status");
		if(status == 1){
			return false;
		}
		$.ajax({
			url:"attentd",
			type:"post",
			data:{author_id:author_id,_token:_token},
			success:function(msg){
				if(msg==1){
					console.log("已经关注过了");
					_this.html("关注成功").css({color:"red"});
				}else if(msg==0){
					console.log("关注成功");
					_this.html("关注成功").css({color:"red"});
				}
				_this.attr("status",1);

			}
		})
	})
</script>

</body>
</html>