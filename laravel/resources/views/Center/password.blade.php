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
    <title>看看吧 修改密码</title>
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
    <style>
        .old_password{
            margin: auto;
            border-radius: 20px;
            padding: 8px;
            margin-top: 20px;
        }
        .new_password{
            margin: auto;
            border-radius: 20px;
            padding: 8px;
            margin-top: 20px;
        }
        .new_password1{
            margin: auto;
            border-radius: 20px;
            padding: 8px;
            margin-top: 20px;
        }
    </style>
    <div id="content">
        <div id="lists" class="content">
            <center>
           <form>
               <table>
                   <tr>
                       <td style="margin-top: 20px">请输入原密码：</td>
                       <td><input class="old_password" type="password" name="old_password" id="old_password"/></td>
                   </tr>
                   <tr>
                       <td style="margin-top: 20px">新密码：</td>
                       <td><input class="new_password" type="password" name="new_password" id="new_password"/></td>
                   </tr>
                   <tr>
                       <td style="margin-top: 20px">请重新输入密码：</td>
                       <td>
                           <input class="new_password1" type="password" name="new_password1" id="new_password1">
                       </td>
                   </tr>
                   <tr>
                       <td colspan="2" style="text-align: center">
                           <a class="login_submit" style="margin-top: 20px;cursor: pointer" id="login_submit">修改</a>
                       </td>
                   </tr>
               </table>
           </form>
            </center>
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
    $(function() {
        $("img.lazy").lazyload({
            event : "sporty"
        });
    });
    $(window).bind("load", function() {
        var timeout = setTimeout(function() { $("img.lazy").trigger("sporty") }, 2000	);
    }); $(document).ready(function () {
        $(document).on("click","#login_submit",function () {
            var old_password=$(".old_password").val();
            var new_password=$(".new_password").val();
            var new_password1=$(".new_password1").val();
            if(old_password==''){
                alert("您输入的原密码不能为空");
                return false;
            }
            if(new_password==''){
                alert("请输入您要修改的密码");
                return false;
            }
            if(new_password1==''){
                alert("请输入您的新密码");
                return false;
            }
            if(new_password!=new_password1){
                alert("您输入的新密码不匹配");
                return false;
            }
            $.ajax({
                type:"get",
                url:"{{url('update_password')}}",
                data:{old_password:old_password,new_password:new_password},
                success:function (data) {
                    if(data==10001){
                        alert("修改成功！");
                    }
                    if(data==10000){
                        alert("修改失败！");
                    }
                    if(data==10002){
                        alert("你输入的密码不正确");
                    }
                }
            })
        })

    })
</script>
</html>