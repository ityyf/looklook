<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="loading">
<head>
    <meta http-equiv="Content-Type" content="textml; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

    <meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="keywords" content="CSS酷站收录站 uehtml 网页设计 DIV+CSS Javascript 酷站 酷站收录 网站设计 网页设计 CSS3" />
    <meta name="description" content="优艺客 设计师网站">
    <meta name="author" content="优艺客" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <link rel="stylesheet" href="dist/dropload.css">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta http-equiv="Content-Type" content="textml;charset=utf-8"/>
    <script type="text/javascript" charset="utf-8" src="ueditor/1.4.3/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor/1.4.3/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
    <script>
        var logined = 0
    </script>
    <title>看看吧 发送私信</title>
    <style>
        .button{
            padding: 5px 10px;
            background: lightblue;
            border: 1px solid white;
            color: black;
        }
        .button:hover{
            text-decoration: none;
            color: white;
            background: black;
        }
        .text{
            width: 360px;
            height: 25px;
        }
    </style>
</head>
<body height="auto;">
<script>
    var now_page = 1,
            search_value = '';
</script>
<form action="{{url('add_private')}}" name="form1" required method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<input type="hidden" name="user_id" value="<?php echo $user_id?>"/>
    <input type="text" name="title"style="width:700px;height:30px;"placeholder="标题"/>
            <script id="editor" type="text/plain" style="width:1024px;height:300px;"></script>
            <script type="text/javascript">
                var editor = new UE.ui.Editor();
                editor.render("myEditor");
            </script>
            <div>
                <span id='box' style="display:none"></span>
                <input type="submit" class='button' id='but' value="提交" >
                <input type="button"  id='back' class='button' value='取消并返回'/>
            </div>
            <div style="display:none" id='article_content'></div>
</form>
<script language="javascript" src="js/zepto.min.js"></script>
<script language="javascript" src="js/script.js"></script>
</body>
<script>
    var ue = UE.getEditor('editor');
    $(function(){
        $('#back').click(function(){
            location.href='center';
        })
        $('#but').click(function(){
            $('#box').append("<input name='drafts' type='text' value='1'>");
        })

    })

    $(document).ready(function () {
        var ue = UE.getEditor('editor');
        var proinfo = $("#article_content").html();

        ue.ready(function () {//编辑器初始化完成再赋值
            ue.setContent(proinfo);  //赋值给UEditor
        });
    })
</script>
<ml>
