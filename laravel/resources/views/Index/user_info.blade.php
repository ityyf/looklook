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
<div id="user">
    <div class="account">
        <div class="login_b_t">
            <div class="pd10">
                <div class="fl">还没有账号<a id="reg_now" href="" onclick="return false;">立即注册</a></div><div class="fr"><a href="#">忘记密码?</a></div><div class="clear"></div>
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
<div id="header">
    <div class="wrap">
        <i class="menu_open"></i>
        <div class="logo"><a href="#" title="uthml酷站大全"><img src="css/logo.png" /></a></div>
    </div>
    <div class="logo_msk"></div>
</div>
<div id="container">
@include('Public.sort')    

    <style>
        .top{
            width: 90%;
            margin: auto;
            height: 100px;
            padding: 20px;
        }
        .attentd,.clear_attentd{
            border: 1px solid #66cc99;
            padding: 5px 20px;
            background: #66cc99;
            color: white;
            font-size: 12px;
            cursor: pointer;
            margin-top: 10px;
        }
        #private{
            border: 1px solid #6699ff;
            padding: 5px 20px;
            background: #6699ff;
            color: white;
            font-size: 12px;
            cursor: pointer;
            margin-top: 10px;
        }
        #attentd_private{
            margin-top: 10px;
        }
    </style>
    <div id="content">
        <div id="lists" class="content">
            <div class="top">

                <div style="float: left">
                    <img style="border-radius: 5%" width="100px" height="100px" src="http://www.hanhaojie.cn/<?=$user['user_photo'] ?>">
                </div>
                <div style="float: left; margin-left: 10px">
                    <span style="color: orangered;font-weight: bold;font-size: 18px"><?=$user['user_email'] ?></span>

                    <div id="attentd_private" author_id="<?=$user['user_id']?>">
                        <?php if($is_attentd == '1'){?>
                            <span class="clear_attentd">取消关注</span>
                            <span class="attentd" style="display: none;">++关注</span>
                        <?php }else{?>
                            <span class="clear_attentd" style="display: none;">取消关注</span>
                            <span class="attentd">++关注</span>
                        <?php }?>
                        <span id="private" onclick="location.href = '{{('private')}}?user_id=<?=$user['user_id']?>';">发私信</span>
                    </div>

                    <span>
                        <?php if($user['user_address']==''||$user['user_birth']=='') {?>
                        <br>
                            现居：未设置&nbsp;&nbsp;&nbsp;&nbsp;
                            生日：未设置
                        <?php } else { ?>
                            <br>
                            现居：<?=$user['user_address'] ?>&nbsp;&nbsp;&nbsp;&nbsp;
                            生日：<?=$user['user_birth'] ?>
                        <?php }?>
                    </span>
                </div>

            </div>
            <?php if(count($article)==0){ ?>
            <center>
                <br>
                <span style="font-size: 20px;color: #cccccc;">他还没有发表任何文章哦......</span>
            </center>
           <?php }else{ ?>
	<span style="margin-left:5px;">他的文章：</span>
	
            @foreach($article as $key=>$v)
                <li class="lists" uid="<?php echo $v['article_id'] ?>">
                    <div class="wrap">
                        <a class="alist" href="{{url('/zhengwen')}}?article_id=<?=$v['article_id']?>">
                            <div class="list_litpic fl"><img class="lazy" src="http://www.hanhaojie.cn/<?php echo $v['head_img'] ?>" /></div>
                            <div class="list_info">
                                <h4><?php  echo $v['article_name']?></h4>
                                <div class="list_info_i">
                                    <dl class="list_info_views">
                                        <dt></dt>
                                        <dd><?php echo $v['page_views'] ?></dd>
                                        <div class="clear"></div>
                                    </dl>
                                    <dl class="list_info_comment">
                                        <dt></dt>
                                        <dd><?php echo $v['reply_num']; ?></dd>
                                        <div class="clear"></div>
                                    </dl>
                                    <dl class="list_info_like">
                                        <dt></dt>
                                        <dd><?php echo $v['like'] ?></dd>
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
	<?php }?>
            {{--<div class="list_loading"><i></i><span>努力加载中...</span></div>--}}
            <div id='pagination'>

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

<input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">

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

    //点击取消关注
    $(".clear_attentd").click(function(){

        var author_id = $(this).parent().attr("author_id");
        var _this = $(this);
        var _token=$('#_token').val();

        $.ajax({
            url:"clear_attentd",
            type:"post",
            data:{author_id:author_id,_token:_token},
            success:function(msg){
                console.log(msg);
                if(msg == 'ok'){
                    _this.hide();
                    _this.parent().children(".attentd").show();
                }
            }
        })

    })
    /**
     *	点击关注作者
     */
    $('.attentd').click(function(){

        var author_id = $(this).parent().attr("author_id");
        var _this = $(this);
        var _token=$('#_token').val();

        $.ajax({
            url:"attentd",
            type:"post",
            data:{author_id:author_id,_token:_token},
            success:function(msg){
                if(msg==1){
                    console.log("已经关注过了");
                    _this.parent().children(".clear_attentd").show();
                    _this.hide();
                }else if(msg==0){
                    console.log("关注成功");
                    _this.parent().children(".clear_attentd").show();
                    _this.hide();
                }else if(msg==3){
                    console.log('尚未登录');
                    location.href="user_login";
                }

            }
        })
    })
</script>
</html>
