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

    <div class="login_b_i">
        <div class="login_input">
            <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="login_user"><input type="text" name="user_email" placeholder="邮箱"  id="user_email"/><i></i></div>
            <div class="login_password"><input type="password" name="user_pwd" placeholder="新密码" id="user_pwd"/><i></i></div>
            <div class="login_password"><input type="text" name="check" placeholder="邮箱验证码" id="check" /><i></i></div>
            <span id="tishi" style="color: red"></span>
        </div>
    </div>
    <input type="button" value="获取验证码" class="login_submit"  id="but">
    <br>
    <input type="submit" value="确定" class="login_submit" id="sub">
</body>
<script language="javascript" src="js/zepto.min.js"></script>
<!-- <script language="javascript" src="js/fx.js"></script> -->
<script language="javascript" src="js/script.js"></script>
<script language="javascript" src="js/jquery.lazyload.js"></script>
<script src="dist/dropload.min.js"></script>
</html>
<script>
    var num=60;
    $("#but").click(function () {
        var user_email = $("#user_email").val();
        if(user_email==''){
            $("#tishi").html("邮箱不能为空");
            return false;
        }else{
            $("#tishi").html("");
            function  fun () {
            num=num-1;
            $('#but').attr({"disabled":"disabled"});
            $('#but').val(num+'秒后可操作');
            if(num==0){
                $('#but').val('获取验证码');
                $('#but').removeAttr('disabled');
                clearInterval(set);
                num=60;
            }
        }
            var set=setInterval(fun,1000);
            $.ajax({
                type: "get",
                url: "{{('add')}}",
                data: {user_email:user_email},
                success: function(msg){
                    if(msg == 1){
                        alert("验证码已经发送，请查收");
                    }
                }
            });}


    });
    $("#user_email").blur(function () {
        var user_email = $("#user_email").val();
        var re = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/;
        if (!re.test(user_email)) {
            $("#tishi").html("邮箱格式不对");
            return false;
        }else {
            $("#tishi").html("");
        }
    });
    $("#check").blur(function () {
        var check = $("#check").val();
        $.ajax({
            type: "get",
            url: "{{('check')}}",
            data: {check:check},
            success: function(msg){
                if(msg == 0){
                    $("#tishi").html("验证码错误");
                    return false;
                }else{
                    $("#tishi").html("");
                }
            }
        });
    })
    $("#sub").click(function () {
        var user_email = $("#user_email").val();
        var user_pwd = $("#user_pwd").val();
        var check = $("#check").val();
        var _token = $("#_token").val();
        if(user_email==''){
            $("#tishi").html("邮箱不能为空");
            return false;
        }
        if(user_pwd==''){
            $("#tishi").html("请输入密码");
            return false;
        }
        if(check==''){
            $("#tishi").html("请填写验证码");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "{{('check_pwd')}}",
            data: {user_email:user_email,user_pwd:user_pwd,check:check,_token:_token},
            success: function(msg){
                if(msg == 1){
                    alert("修改成功");location.href='{{url('/')}}';
                }else{
                    $("#tishi").html("修改失败");
                    return false;
                }

            }
        });
    })
</script>