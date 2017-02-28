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
    <title>看看吧 个人中心</title>
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
        .top{
            width: 90%;
            margin: auto;
            height: 100px;
            padding: 20px;
        }
    </style>
    <div id="content">
        <div id="lists" class="content">
            <div class="top">

                <div style="float: left">
                    <img style="border-radius: 5%" width="100px" height="100px" src="http://www.hanhaojie.cn/<?=$user['user_photo'] ?>">
                </div>
                <div style="float: left; margin-left: 10px">
                    <span style="color: orangered;font-weight: bold;font-size: 18px"><?=$user['user_email'] ?></span>
                    

                    <span>
                        <?php if($user['user_address']==''||$user['user_birth']=='') {?>
                        <br>
                            现居：未设置&nbsp;&nbsp;&nbsp;&nbsp;
                            生日：未设置
                        <?php } else { ?>
                        <br>
                            现居：<?=$user['user_address'] ?>&nbsp;&nbsp;&nbsp;&nbsp;
                            生日：<?=$user['user_birth'] ?>
                        <?php }?>
                    </span>
                </div>

            </div>

            <ul >
                <input type="hidden" value="" id="hiddenType">
                <?php if(count($article)== 0) {?>
                <center>
                    <div style="margin-top: 100px;margin-bottom: 160px">
                        <span style="color: #cccccc;font-size: 20px;">您还没有发表任何文章哦......赶快去发表文章吧.....<a href="{{url('addArticle')}}" style="color:red;cursor: pointer">点我！点我！</a></span>
                    </div>
                </center>
                <?php }else{ ?>
                @foreach($article as $key=>$val)
                    <li class="lists" uid="<?php echo $val['article_id'] ?>">
                        <div class="wrap">
                            <a class="alist" href="{{url('/zhengwen')}}?article_id=<?=$val['article_id']?>">
                                <div class="list_litpic fl"><a href='{{url('head')}}'><img class="lazy" src="http://www.hanhaojie.cn/<?php echo $val['head_img'] ?>" /></a></div>
                                <div class="list_info">
                                    <h4><?php  echo $val['article_name']?></h4>
                                    <h5><em>(<?php echo $val['type_name'] ?>)</em></h5>
                                    <div class="list_info_i">
                                        <dl class="list_info_views">
                                            <dt></dt>
                                            <dd><?php echo $val['page_views'] ?></dd>
                                            <div class="clear"></div>
                                        </dl>
                                        <dl class="list_info_comment">
                                            <dt></dt>
                                            <dd><?php echo $val['reply_num']; ?></dd>
                                            <div class="clear"></div>
                                        </dl>
                                        <dl class="list_info_like">
                                            <dt></dt>
                                            <dd><?php echo $val['like'] ?></dd>
                                            <div class="clear"></div>
                                        </dl>
<dl class="list_info_like">
                                            <dt></dt>
                                            <dd><?php if( $val['status']==0){echo "审核中";}else if($val['status']==2){echo "审核未通过";} else if($val['status']==1){echo "审核已通过";}else if($val['status']==3){echo "未通过审核";}?></dd>
                                            <div class="clear"></div>
                                        </dl>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </a>
                        </div>
                    </li>
                @endforeach
                <?php } ?>
            </ul>
            {{--<div class="list_loading"><i></i><span>努力加载中...</span></div>--}}
            <div id='pagination'>
            </div>
        </div>
        <center>
            <div class="footer" style="background-color: #add8e6;height: 80px" >
                <p>网站的名称：<?php echo $foot['website_title'] ?></p>
                <p>网站描述：<?php echo $foot['website_description'] ?></p>
                <p>底布版权信息：<?php echo $foot['website_copyright'] ?></p>
            </div>
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
   @include('Public.register')
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
</script>
</html>
