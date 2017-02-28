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
    <title>看看吧 我的评论详情</title>
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
    <div id="content">
        <div id="lists" class="content">
            <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">
            <ul >
                <?php foreach($res as $key=>$val):?>
                <li class="lists" >
                    <div class="si" style="margin-left: 10px; margin-top: 60px;">
                        <table>
                            <tr>
                                <td style="font-size: larger;color: #2d6dcc"><?php echo $val['user_email']?>：<?php echo $val['private']?></td>
                                <td><a href="{{('private_connect')}}?private_id=<?php echo $val['private_id']?>" style="margin-left: 60px; color: royalblue" ><?php echo $val['title']?></a></td>
                                <input type="hidden" id="pid" value="<?php echo $val['pid']?>">
                                <input type="hidden" id="user_id" value="<?php echo $val['my_id']?>">
                                <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
                            </tr>
                        </table>
                        <?php endforeach;?>
                        <br>
                        <table>
                            <tr>
                                <td><textarea rows="8px" cols="35px" id="private"></textarea></td>
                            </tr>
                            <tr>
                                <td><input type="button" id="fashe" value="发射私信" style="color: #0000aa"/></td>
                            </tr>
                        </table>
                    </div>

                </li>

            </ul>
            {{--<div class="list_loading"><i></i><span>努力加载中...</span></div>--}}
            <div id='pagination'>
            </div>
        </div>
    </div>
    <div class="push_msk"></div>
</div>

@include('Public.centertop')

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
<script>
    $("#fashe").click(function () {
        var lala=$("#private").val();
        var pid=$("#pid").val();
        var user_id=$("#user_id").val();
        var _token=$("#_token").val();
        $.ajax({
            type: "post",
            url: "{{('reply_private')}}",
            data: {lala:lala,pid:pid,user_id:user_id,_token:_token},
            success: function(msg){
                if(msg == 1){
                    window.location.reload();
                }
            }
        });
    })
</script>