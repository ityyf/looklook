
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
    </style>
</head>
<body>
<script>
    var now_page = 1,
    search_value = '';
</script>

   <form action="{{url('add_pro')}}" name="form1" required method="post" enctype="multipart/form-data">
    <input type="text"  class="text"required name="title" placeholder='请输入标题' />
    <input type="text" class="text" required name="intro" placeholder='请输入简介' />
    <input type="text" class="text" required name="keywords" placeholder='标签,多个标签以空格符分割' />
  
    <input type="file"  class="text" required  name="head_img" >
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <select name="type" class="select">
    <?php foreach($type as $key=>$val){ ?>
        <option value="<?php echo $val['type_id'] ?>">
    <?php echo $val['type_name'] ?></option>
    <?php } ?>
    </select>
    <script id="editor" type="text/plain" style="width:350px;height:300px;"></script>
    <script type="text/javascript">
    var editor = new UE.ui.Editor();
    editor.render("myEditor");
    </script>
    <div>
    <span id='box' style="display:none"></span>
    <input type="submit" class='button' id='but' value="提交" >
    <input type="button"  id='back' class='button' value='取消并返回'/>
    
    <input type="submit"  id='sub' class='button'value="保存到草稿箱" >
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