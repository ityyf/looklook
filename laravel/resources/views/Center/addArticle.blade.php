
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
    <link title="style1" rel="stylesheet" href="style.css" type="text/css" />

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



    <div class="form_content">
        <form  action="{{url('add_pro')}}" name="form1" required method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <fieldset>
                <legend>填写文章基本信息</legend>
                <div class="form-row">
                    <div class="field-label"><label for="field1">文章标题</label>:</div>
                    <div class="field-widget"><input required  name="title"  class="required" title="Enter your name" /></div>
                </div>

                <div class="form-row">
                    <div class="field-label"><label for="field2">文章简介</label>:</div>
                    <div class="field-widget"><input required name="intro" class="required" title="Enter your name" /></div>
                </div>

                <div class="form-row">
                    <div class="field-label"><label for="field3">文章标签</label>:</div>
                    <div class="field-widget"><input required name="keywords" placeholder='标签,多个标签以空格符分割' class="required" title="Enter your name" /></div>
                </div>

                <div class="form-row">
                    <div class="field-label"><label for="field6">文章分类</label>:</div>
                    <div class="field-widget">
                        <select name="type" class="validate-selection" title="Choose your department">
                            <?php foreach($type as $key=>$val){ ?>
                            <option value="<?php echo $val['type_id'] ?>">
                                <?php echo $val['type_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

            </fieldset>
            <fieldset>
                <legend>文章主体信息</legend>

                <div class="form-row">
                    <div class="field-label"><label for="field4">封面图片</label>:</div>
                    <div class="field-widget"> <input type="file"  class="text" required  name="head_img" ></div>
                </div>

                <div class="form-row">
                    <div class="field-label"><label for="field5">背景音乐</label>:</div>
                    <div class="field-widget"><input type="file"  class="text" required  name="article_music" value="选择背景音乐" ></div>
                </div>



                <div class="form-row">
                    <div class="field-label"><label for="field7">文章内容</label>:</div>
                    <div class="field-widget">
                        <script id="editor" type="text/plain" style="width:320px;height:150px;"></script>
                        <script type="text/javascript">
                            var editor = new UE.ui.Editor();
                            editor.render("myEditor");
                        </script>
                        <div style="margin-left: 2%;margin-top: 1%">
                            <span id='box' style="display:none"></span></div>
                </div>

                <div class="form-row"></div>
                    <div class="form-row">
                        <div class="field-label"><input type="submit" class="submit" id='but' value="提交新文章" /></div>
                        <div class="field-widget"> <input class="reset" type="submit" id='sub' value="提交到草稿箱" onclick="valid.reset(); return false" /></div>
                    </div>



            </fieldset>


        </form>
    </div>
















































    <script language="javascript" src="js/zepto.min.js"></script>
    <script language="javascript" src="js/script.js"></script>
</body>
<script>
    var ue = UE.getEditor('editor');
    $(function(){
        $('#back').click(function(){
            location.href='center';
        });
        $('#but').click(function(){
            $('#box').append("<input name='drafts' type='text' value='1'>");
        })

    })
</script>
</html>