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
    <title>看看吧 我的评论列表</title>
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
	.style:hover{
	    color: #a6e1ec;
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
        <div class="logo"><a href="#" title="看看吧"><img src="css/logo.png" /></a></div>
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
            <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">
            <ul >
                <?php foreach($data as $key=>$val):?>
                <li class="lists" >
                    <div class="si" style="margin-top: 20px;">
                    <table>
                        <tr>
			                <td>标题：</td>
                            <td><a class='style'  href="{{('private_connect')}}?private_id=<?php echo $val['private_id']?>" style="margin-left: 60px; color: royalblue" ><?php echo $val['title']?></a></td>
                        </tr>
                        <tr>
                            <td>时间：</td>
                            <td><?php echo $val['add_time']?></td>
                        </tr>
                        <tr>
                            <td>发送人：</td>
                            <td><?php echo $val['user_email']?></td>
                        </tr>
                    </table>
                    <br>
                    </div>
                </li>
                <?php endforeach;?>
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
<script language="javascript" src="js/jquery.lazyload.js"></script>
<script src="dist/dropload.min.js"></script>
</body>
<script type="text/javascript">

</script>
</html>
