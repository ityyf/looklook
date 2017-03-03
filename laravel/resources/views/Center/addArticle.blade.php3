
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
        <link rel="stylesheet" href="dist/dropload.css">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script type="text/javascript" charset="utf-8" src="ueditor/1.4.3/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor/1.4.3/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
    <script>
        var logined = 0
    </script>
    <title>看看吧 发表文章</title>
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
            width: 1024px;
            height: 25px;
        }
         form h3{
               margin-left:3%;
               margin-top:1% ;
         }
        form {
            color: black;
            font-size: 14px;
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
<div id="container">
    <div id="sort">
        <table width="100%" border="0" cellspacing="0">
            <tr>
                <td class="sort_right">
                    <div class="sort_tag">
                        <div class="sort_b" style="color: white">新文章发布</div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

   <form action="{{url('add_pro')}}" name="form1" required method="post" enctype="multipart/form-data">
    <h4> 请输入标题 <input type="text"  class="text"required name="title" placeholder='请输入标题' style="width:350px;"/></h4>
       <h4> 请输入简介 <input type="text" class="text" required name="intro" placeholder='请输入简介' style="width:350px;"/></h4>
           <h4> 标签(空格分割)  <input type="text" class="text" required name="keywords" placeholder='标签,多个标签以空格符分割' style="width:350px;"/></h4>
               <h4> 选择封面头像  <input type="file"  class="text" required  name="head_img" style="width:350px;"></h4>
                   <h4> 选择背景音乐 <input type="file"  class="text" required  name="article_music" value="选择背景音乐" style="width:350px;"></h4>
                       <h4>  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"></h4>
                           <h4> 选择分类 <select name="type" class="select" style="width:50px;background: url('/public/images/1421841277109.jpg') no-repeat">
    <?php foreach($type as $key=>$val){ ?>
        <option value="<?php echo $val['type_id'] ?>">
    <?php echo $val['type_name'] ?></option>
    <?php } ?>
    </select></h4>
    <script id="editor" type="text/plain" style="width:350px;height:300px;margin-left:2%;margin-top:1%"></script>
    <script type="text/javascript">
    var editor = new UE.ui.Editor();
    editor.render("myEditor");
    </script>
    <div style="margin-left: 2%;margin-top: 1%">
    <span id='box' style="display:none"></span>
    <input type="submit" class='button' id='but' value="提交" >
    <input type="button"  id='back' class='button' value='取消并返回'/>
    
    <input type="submit"  id='sub' class='button' value="保存到草稿箱" >
    </div>
      
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
</script>
</html>