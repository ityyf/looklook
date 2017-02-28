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

@include('Public.sort')

<div style="" id="container">
    <div id="content">
        <center style="font-size:16px;line-height:26px;margin:30px 0;color:#f90;">——— 关于看看吧 ———</center>
        　　看看吧（<a href="http://look.hanhaojie.cn">look.hanhaojie.cn</a>），一个综合娱乐平台，包含影像、音频、图画、文字、游戏等各方面内容。<br />
        　　<b>“热爱生活，传播美好”</b>，在兼顾趣味性的同时，发布的内容以张扬<b>创意、激情、梦想的生活态度</b>为主旨，让大家在娱乐中感受生活的乐趣。
        <div>&nbsp;</div>
        <center style="font-size:16px;line-height:26px;margin:30px 0;color:#f90;">——— 创建初衷 ———</center>
        　　“你还在为斑驳松弛的娱乐信息而苦恼不堪吗？你还在为扁平下垂的娱乐资讯而郁郁寡欢吗？”——纵观横比目前的网络娱乐，很容易让人想到这种“成人用品电视营销”式的暧昧语气。人人都有自己的娱乐概念和方式，我们要做的，就是诠释和呈现我们倡导的<b>“人文化娱乐”</b>：娱乐在放松身心的同时，也能给我们以人文、哲学甚至是信仰的思考。这也正是下面所说的“不仅仅是娱乐”。<br />
        　　虽不能至，心向往之。
        <div>&nbsp;</div>

        <center style="font-size:16px;line-height:26px;margin:30px 0;color:#f90;">——— 宗旨：分享•情怀•超越—不仅仅是娱乐 ———</center>
        　　<b>分享</b>：有个子曾经曰过：<b>独乐了不如众乐了</b>。<br />
        　　让我们共同分享生活的乐趣和生命的美好。作为一个平台，looklook吧的资源均由网友推荐、分享和发布。<br />
        　　<b>情怀</b>：人文情怀。<br />
        　　让我们尽力表达生活的美好，或许，生命会因此丰满并充满意义。娱乐载道：何谓“道”？<b>丰满生命</b>。<br />
        　　<b>超越</b>：说得诗意些，每一颗心都包裹着一个飞翔的梦想，<b>“飞翔其实一直藏在我们的肋下”</b>；说得神乎些，上帝将一颗永恒的种子播撒在每一个人的心里，“寻求超越、追求永恒”是每一颗心隐秘的渴求。
        <div>&nbsp;</div>

        <center style="font-size:16px;line-height:26px;margin:30px 0;color:#f90;">—— 有话说 ——</center>
        　　<strong>或许，通过下面的只言片语，大家可以一窥looklook吧的“情怀”和“气质”：</strong><br />
        　　让人看到世界的多样性，而不是成为单一的人。在任何细小的东西里发现让人欣慰的东西。<strong>（Senhey）</strong><br />
        　　做好东西，但不刻意招徕。我只希望U吧能够脚步从容淡定地走得更远，路上一直操持清醒独立，就算杂沓纷扰，也不乱了自己的身姿。<strong>（Minlo）</strong><br />
        　　让人很轻松地卸掉工作中的伪装，做回原本自然的自己。<strong>（Jenqy）</strong><br />
        　　娱乐常常是我们平常生活中一点一滴的精彩。<strong>（Hojay）</strong><br />
        　　从整个网站的气质来说，可以概括成“人文化娱乐” 。<strong>（Selene）</strong><br />
        　　<strong>我们正在成长……需要您的搀扶……</strong>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
    </div>
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
