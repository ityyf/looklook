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
    <title>看看吧 我的收藏</title>
    <style>
        .a_type{
            color: black;
        }
        #pagination{
            height: 50px;
            margin: 20px 25.3% 40px;
        }
        #pagination li{
            float: left;
            margin-right: -10px;
            width: 100px;
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

<div id="header">
    <div class="wrap">
        <i class="menu_open"></i>
        <div class="logo"><a href="" title="看看吧"><img src="css/logo.png" /></a></div>
    </div>
    <div class="logo_msk"></div>
</div>
<div id="container">
    <div id="sort">
        <table width="100%" border="0" cellspacing="0">
            <tr>
                <td class="sort_left">
                    <div class="sort_cate">
                        <div class="sort_b"><a href="#" onclick="return false;"><div class="sort_b_inner"><i class="cate_default"></i><span>我的空间</span><div class="clear"></div></div></a></div>
                    </div>
                </td>
                <td>
                    <div class="sort_sort">
                        <div class="sort_b"><a href="#" onclick="return false;"><div class="sort_b_inner"><i class="cate_sort"></i><span>我的文章</span><div class="clear"></div></div></a></div>
                    </div>
                </td>
                <td class="sort_right">
                    <div class="sort_tag">
                        <div class="sort_b"><a href="#" onclick="return false;"><div class="sort_b_inner"><i class="cate_tag"></i><span>我的设置</span><div class="clear"></div></div></a></div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div id="content">
        <div id="lists" class="content">
            <ul >
                <input type="hidden" value="" id="hiddenType">

                    <li class="lists" uid="">
                        <div class="wrap">
                          <?php if(empty($article)) { ?>
			<center>
				<div style="margin-top: 150px">
					<a style="font-size:20px" href="{{url('/')}}">您还没有收藏任何文章<br><span style="color:red">点我进入首页!</span></a>
				</div>
			</center>
			<?php } ?>

                            <?php foreach($article as $K=>$v):?>
                            <div class="list_litpic fl"><img class="lazy" src="http://www.hanhaojie.cn/<?=$v['head_img']?>" /></div>
                            <div class="list_info">
                                <h4>
                                    <a style="color:black;" class="alist" href="{{url('/zhengwen')}}?article_id=<?=$v['article_id']?>">
                                        <?=$v['article_name']?>
                                    </a>
                                </h4>
                                <h5><em>(<?=$v['type_name']?>)</em></h5>
                                <div class="list_info_i">
                                    <dl class="list_info_views">
                                        <dt></dt>
                                        <dd><?=$v['page_views']?></dd>
                                        <div class="clear"></div>
                                    </dl>
                                    <dl class="list_info_comment">
                                        <dt></dt>
                                        <dd><?=$v['reply_num']?></dd>
                                        <div class="clear"></div>
                                    </dl>
                                    <dl class="list_info_like">
                                        <dt></dt>
                                        <dd><?=$v['like']?></dd>
                                        <div class="clear"></div>
                                    </dl>
                                    <dl class="list_info_like">
                                        <span class="collect" status="1" article_id="<?=$v['article_id']?>" style="color:blue;cursor:pointer;">
                                            取消收藏
                                        </span>
                                    </dl>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <?php endforeach;?>

                            <div class="clear"></div>
                        </div>
                    </li>
            </ul>
            {{--<div class="list_loading"><i></i><span>努力加载中...</span></div>--}}
            <div id='pagination'>
            </div>
        </div>
    </div>
    <div class="push_msk"></div>
</div>
@include('Public.centertop')
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
    <div class="wrap reg_ct">
        <p>您可以选择以下第三方帐号直接登录uehtml<br />一分钟完成注册</p>
        <a href="http://www.17sucai.com/oauth/weibo/login" id="weibo_app"><span><i></i>微博帐号登录</span></a>
        <a href="http://www.17sucai.com/oauth/qq/login" id="qq_connect"><span><i></i>QQ&nbsp;&nbsp;帐号登录</span></a>
    </div>
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
<script language="javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/zepto.min.js"></script>
<!-- <script language="javascript" src="js/fx.js"></script> -->
<script language="javascript" src="js/script.js"></script>
{{--<script language="javascript" src="js/jquery.lazyload.js"></script>--}}
<script src="dist/dropload.min.js"></script>
</body>
<input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">
<input type="hidden" id="user_id" value="<?php echo session('user_id'); ?>">

<script type="text/javascript">
    $(function() {
//        $("img.lazy").lazyload({
//            event : "sporty"
//        });
    });
    $(window).bind("load", function() {
        var timeout = setTimeout(function() { $("img.lazy").trigger("sporty") }, 2000	);
    });

    /**
     * 点击收藏文章
     */
    $(".collect").click(function(){
        var user_id=$('#user_id').val();
        var status=$(this).attr('status');
        if(user_id==''){
            $('#reg_index').addClass('show');
            return false;
        }

        var article_id = $(this).attr('article_id');
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
                        _this.html("++收藏");
                    }else{
                        console.log("取消收藏失败");
                        _this.html("++收藏");
                    }
                    _this.attr("status",0);
                }else {
                    if(msg==1){
                        console.log("收藏成功");
                        _this.html("取消收藏");
                    }else{
                        console.log("收藏失败");
                        _this.html("取消收藏");
                    }
                    _this.attr("status",1);
                }
            }})
    });

</script>
</html>
