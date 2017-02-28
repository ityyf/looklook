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
        #box a{
            color:black;
        }
        #box a:hover{
            color: lightblue;
            font-weight: bolder;
        }
        #box{
            padding: 20px;
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
<div style="line-height:26px;font-size:12px;" id="box">
    <a href="http://erji.hao123.com/xiaoqingxin" target="_blank" title="hao123小清新">hao123小清新</a>　
    <a href="http://www.wangxiaofeng.me" target="_blank" title="不许联想">不许联想</a>　
    <a href="http://www.slxun.com" target="_blank" title="一带一路城市网">一带一路城市网</a>　
    <a href="http://jandan.net" target="_blank" title="煎蛋">煎蛋</a>　
    <a href="http://photo.poco.cn" target="_blank" title="POCO摄影">POCO摄影</a>　
    <a href="http://www.17k.com" target="_blank" title="17K小说">17K小说</a>　
    <a href="http://xiangce.baidu.com" target="_blank" title="百度相册">百度相册</a>　
    <a href="http://www.xinli001.com" target="_blank" title="壹心理">壹心理</a>　
    <a href="http://www.jinhusns.com" target="_blank" title="近乎">近乎</a>　
    <a href="http://www.coocg.com" target="_blank" title="漫天糖">漫天糖</a>　
    <a href="http://www.manmankan.com" target="_blank" title="火影忍者">火影忍者</a>　
    <a href="http://www.mahua.com" target="_blank" title="快乐麻花">快乐麻花</a>　
    <a href="http://www.zongheng.com" target="_blank" title="纵横小说网">纵横小说网</a>　
    <a href="http://www.laifudao.com" target="_blank" title="来福岛">来福岛</a>　
    <a href="http://www.52souluo.com" target="_blank" title="我爱搜罗网">我爱搜罗网</a>　
    <a href="http://qd.ifeng.com" target="_blank" title="凤凰网青岛">凤凰网青岛</a>　
    <a href="http://www.xilu.com" target="_blank" title="西陆军事">西陆军事</a>　
    <a href="http://www.duomi.com" target="_blank" title="多米音乐">多米音乐</a>　
    <a href="http://www.2345.com" target="_blank" title="2345网址">2345网址</a>　
    <a href="http://www.itouxian.com" target="_blank" title="爱偷闲">爱偷闲</a>　
    <a href="http://www.qclyd.com" target="_blank" title="神州汽车露营地">神州汽车露营地</a>　
    <a href="http://www.ishhuo.com" target="_blank" title="爱生活">爱生活</a>　
    <a href="http://www.xihaiannews.com" target="_blank" title="青岛西海岸新闻网">青岛西海岸新闻网</a>　
    <a href="http://www.sxbbm.com" target="_blank" title="师兄帮帮忙">师兄帮帮忙</a>　
    <a href="http://tuan.xihaiannews.com/" target="_blank" title="海岸团">海岸团</a>　
    <a href="http://www.arita.cc" target="_blank" title="ARITA阿里塔">ARITA阿里塔</a>　
    <a href="http://www.fengniao.com" target="_blank" title="蜂鸟网">蜂鸟网</a>　
    <a href="http://www.wozheka.com" target="_blank" title="我淘卡">我淘卡</a>　
    <a href="http://www.ruishitv.com/" target="_blank" title="睿视网">睿视网</a>　
    <a href="http://www.9mtu.cn/" target="_blank" title="九美图">九美图</a>　
    <a href="http://www.yiyuandesign.com/" target="_blank" title="怡元设计">怡元设计</a>　
    <a href="http://www.ruhonglife.com/" target="_blank" title="如弘家具">如弘家具</a>　
    <a href="http://www.coolxoo.com" target="_blank" title="酷迅网">酷迅网</a>　
    <a href="http://qng.im/" target="_blank" title="青果QNGOO">青果QNGOO</a>　
    <a href="http://www.shashatu.com/" target="_blank" title="傻傻图">傻傻图</a>　
    <a href="http://dorazzz.com" target="_blank" title="哆啦网">哆啦网</a>　
    <a href="http://www.huangjiwei.com/blog/" target="_blank" title="孤岛客">孤岛客</a>　
    <a href="http://www.k2gou.cn" target="_blank" title="孔二狗">孔二狗</a>　
    <a href="http://www.my7475.com" target="_blank" title="奇事奇物网">奇事奇物网</a>　
    <a href="http://cartoon.zwbk.org" target="_blank" title="动漫百科">动漫百科</a>　
    <a href="http://maitang.com" target="_blank" title="麦糖">麦糖</a>　
    <a href="http://www.mimoprint.com" target="_blank" title="创意个性礼品">创意个性礼品</a>　
    <a href="http://www.liudaiquan.com" target="_blank" title="幻觉摄影">幻觉摄影</a>　
    <a href="http://www.printyourmind.com" target="_blank" title="创意礼物">创意礼物</a>　
    <a href="http://www.yixieshi.com" target="_blank" title="互联网的一些事">互联网的一些事</a>　
    <a href="http://www.lequ001.com" target="_blank" title="乐趣小游戏">乐趣小游戏</a>　
    <a href="http://www.xxlifexx.com" target="_blank" title="制品">制品</a>　
    <a href="http://www.shzaizhi.com/" target="_blank" title="上海在职教育网">上海在职教育网</a>　
    <a href="http://www.cuixiaoke.com/" target="_blank" title="片段">片段</a>　
    <a href="http://shijueyishu.cc" target="_blank" title="视觉艺术">视觉艺术</a>　
    <a href="http://www.17art.com" target="_blank" title="当代艺术">当代艺术</a>　
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
