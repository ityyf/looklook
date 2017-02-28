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
	<script language="javascript" type="text/javascript" src="carlender/WdatePicker.js"></script>
    <script>
        var logined = 0
    </script>
    <title>看看吧 个人资料</title>
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
    <div id="content" style="height: 800px">
                <input type="hidden" value="" id="hiddenType">
                        {{--<a class="alist" href="{{url('/zhengwen')}}?article_id=">--}}
        <style>
            input{
                border:1px solid #cccccc;
                padding: 10px;
                border-radius: 20px;
            }
            .user_sex{
                padding: 8px;
                border:1px solid #cccccc;
                border-radius: 20px;
                margin-bottom: 4px;
            }
            .user_address{
                padding: 8px;
                border:1px solid #cccccc;
                border-radius: 20px;
                margin-bottom: 4px;
            }
            .a_type{
                color: black;
            }
        </style>
	<center>
            <form method="post" >

                <table style="margin-top: 50px;margin-bottom: 150px">
                    <tr>
                        <td>鼎鼎大名:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td><input style="margin-top: 10px" type="text" class="user_names" name="user_name" placeholder="鼎鼎大名" value="<?=$info[0]['user_name']?>" /></td>
                    </tr>
                    <tr>
                        <td style="margin-top: 10px">是男是女:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        @if($info[0]['user_sex']=='男')
                        <td><input style="margin-top: 10px" type="radio" name="user_sex" class="user_sex" value="保密">&nbsp;&nbsp;保密
                            <input style="margin-top: 10px;" type="radio" name="user_sex" class="user_sex" value="男" checked>&nbsp;&nbsp;男
                            <input style="margin-top: 10px" type="radio" name="user_sex" class="user_sex" value="女">&nbsp;&nbsp;女
                        </td>
                            @elseif($info[0]['user_sex']=='女')
                            <td><input style="margin-top: 10px" type="radio" name="user_sex" class="user_sex" value="保密">&nbsp;&nbsp;保密
                                <input style="margin-top: 10px;" type="radio" name="user_sex" class="user_sex" value="男" >&nbsp;&nbsp;男
                                <input style="margin-top: 10px" type="radio" name="user_sex" class="user_sex" value="女" checked>&nbsp;&nbsp;女
                            </td>
                            @else
                                <td><input style="margin-top: 10px" type="radio" name="user_sex" class="user_sex" value="保密" checked>&nbsp;&nbsp;保密
                                    <input style="margin-top: 10px;" type="radio" name="user_sex" class="user_sex" value="男" >&nbsp;&nbsp;男
                                    <input style="margin-top: 10px" type="radio" name="user_sex" class="user_sex" value="女">&nbsp;&nbsp;女
                            @endif
                    </tr>
                        <tr>
                            <td style="margin-top: 10px">现居何方:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <select name="user_address" class="user_address" style="margin-top: 10px">
                                    <?php foreach($data as $key=>$val) { ?>
                                            <option   <?php if($info[0]['user_address']==$val['area_name']){ echo  'selected';} ?> value="<?php echo $val['area_id'] ?>"  ><?php echo $val['area_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                    <tr>
                        <td style="margin-top: 10px">何时出生:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
			 <input class="Wdate"value="<?php echo $info[0]['user_birth']  ?>"  type="text" onClick="WdatePicker()" id="user_birth">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><a class="login_submit" id="but" style="cursor: pointer;margin-top: 20px">修改</a>
                        </td>
                    </tr>
                </table>

            </form>
        </center>
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
    });
	$(document).ready(function () {
        $(document).on("click","#but",function () {
            var user_name=$(".user_names").val();
            var user_sex=$(".user_sex").val();
            var user_birth=$("#user_birth").val();
            var user_address=$(".user_address").val();
            if(user_name==''){
                alert("姓名不能为空");
                return false;
            }
            if(user_sex==''){
                alert("请选择您的性别");
                return false;
            }
            if(user_birth==''){
                alert("请填写您的生日");
                return false;
            }
            if(user_address==''){
                alert("请填写您的地址");
                return false;
            }
            var birth=Date.parse(user_birth);
            var today=Date.parse(new Date);
            if(birth>=today){
                alert("您输入正确的出生日期");
                return false;
            }
           $.ajax({
               type:'get',
               url:"{{url("user_information")}}",
               data:{user_name:user_name,user_sex:user_sex,user_birth:user_birth,user_address:user_address},
               success:function (data) {
                    if(data!=1){
                        alert("修改个人资料失败");
                    }else{
                        alert("OK");
                    }
               }
           })
        });
    })
</script>
</html>
