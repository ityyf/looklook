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
    <title>我的动态</title>
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

@include("Public.left")

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
        <div class="logo"><a href="#" title="看看吧"><img src="css/logo.png" /></a></div>
        {{--<i class="search_open"></i>--}}
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
    <style>
        .top{
            width: 90%;
            margin: auto;
            height: 100px;
            padding: 20px;
        }
    </style>
    <div class="top">
                <?php foreach ($user as $key=>$val) { ?>
                <div style="float: left">
                    <img style="border-radius: 5%" width="100px" height="100px" src="http://www.hanhaojie.cn/<?php echo $val['user_photo'] ?>">
                </div>
                <div style="float: left; margin-left: 10px">
                    <span style="color: orangered;font-weight: bold;font-size: 18px"><?php echo $val['user_name'] ?></span>
                    <span>
                        <?php if($val['user_address']==''||$val['user_birth']=='') {?>
                        <br>
                            现居：未设置&nbsp;&nbsp;&nbsp;&nbsp;
                            生日：未设置
                        <?php } else { ?>
                            <br>
                            现居：<?php echo $val['user_address'] ?>&nbsp;&nbsp;&nbsp;&nbsp;
                            生日：<?php echo $val['user_birth'] ?>
                        <?php }?>
                    </span>
                </div>
                    <?php } ?>
            </div>
        <div id="lists" class="content">
            <ul >
                <input type="hidden" value="" id="hiddenType">
                <h4 style="margin-left: 30px"><span style="color: #bf5329;font-weight: bolder">关注</span></h4>
                <?php if(empty($your)){
                    echo "无";
                }else{
                 foreach($your as $key=>$v){?>
                            @foreach($v as $k=>$a)
                    <a class="alist" href="{{url('user_info')}}?user_id=<?=$a['user_id']?>">
                        <li class="lists" style="height: 50px">
                            <div class="wrap">
                                <div style="float: left"><img style="margin-left: 50px" width="20px" height="20px" class="lazy" src="http://www.hanhaojie.cn/<?=$a['user_photo'] ?>"/></div>
                                    <div class="list_info" style="margin-left: -10px;margin-top: 10px">
                                        <h5>"<?=$a['user_email']?>"&nbsp;&nbsp;关注了你的文章</h5>
                                    </div>
                                    <div class="clear"></div>
                            </div>
                        </li>
                    </a>
                            @endforeach
                    <?php
                        }
                      }
                    ?>

            </ul>
            {{--评论模块--}}
            <ul >
                <input type="hidden" value="" id="hiddenType">
                <h4 style="margin-left: 30px"><span style="color: #bf5329;font-weight: bolder">评论</span></h4>
                @foreach($article as $key=>$s)
                    <a href="{{url('/zhengwen')}}?article_id=<?=$s['article_id']?>">
                        <div style="margin-left: -75px;">
                            <li class="lists" style="height: 80px">
                                <div class="wrap">
                                    <div class="list_info" style="margin-left: 120px;margin-top: 20px">
                                        <h5>《<?=$s['article_name']?>》被您评论&nbsp;&nbsp;<span style="font-size: xx-small"><?=$s['addtime']?></span></h5>
                                        <br>
                                        <div style="margin-top: 10px"><span style="color: #8e908c">评论内容为：&nbsp;&nbsp;&nbsp;<?=$s['reply_content']?></span>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </li>
                        </div>
                    </a>
                @endforeach
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
   @include('Public.register')
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
        var timeout = setTimeout(function() { $("img.lazy").trigger("sporty") }, 2000   );
    });
</script>
</html>