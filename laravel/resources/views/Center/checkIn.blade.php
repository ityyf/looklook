<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>签到</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
    <link rel='stylesheet' id='prettyphoto-css'  href="css/prettyPhoto.css" type='text/css' media='all'>
    <link href="css/fontello.css" type="text/css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <!-- Load ScrollTo -->
    <script type="text/javascript" src="js/jquery.scrollTo-1.4.2-min.js"></script>
    <!-- Load LocalScroll -->
    <script type="text/javascript" src="js/jquery.localscroll-1.2.7-min.js"></script>
    <!-- prettyPhoto Initialization -->
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
            $("a[rel^='prettyPhoto']").prettyPhoto();
        });
    </script>
    <style>
        .on{
            background: url("images/yuan.jpg")no-repeat center 0;
        }
        .tab tr td{
            text-align: center;
        }
    </style>
</head>
<body>
<!--******************** NAVBAR ********************-->
<div class="navbar-wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner" style="background-color: #1f8902">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
                <nav class="pull-right nav-collapse collapse">
                    <ul id="menu-main" class="nav">
                        <li class="nav_index menu_cur"><a href="{{url('/')}}"><i></i><span>首页</span><b></b><div class="clear"></div></a></li>
                        <li class="nav_help"><a href="{{url('help_show')}}"><i></i><span>帮帮忙</span><b></b><div class="clear"></div></a></li>
                        <li class="nav_site"><a href="{{url("center")}}"><i></i><span>个人中心</span><b></b><div class="clear"></div></a></li>
                    </ul>
                </nav>
            </div>
            <!-- /.container -->
        </div>
        <!-- /.navbar-inner -->
    </div>
    <!-- /.navbar -->
</div>
<!-- /.navbar-wrapper -->
<div id="top"></div>
<!--******************** Services Section ********************-->
<section id="services" class="single-page scrollblock">
    <div class="container">
        <h1>签到中心</h1>
        <!-- Four columns -->
        <div class="row">
            <div class="container">
                <div class="align"> <i class="icon-brush sev_icon"></i> </div>
                <h2>{{date('Y-m')}}</h2>
                <table width="100%" class="tab">
                    <tr style="height: 50px">
                        <td>周日</td>
                        <td>周一</td>
                        <td>周二</td>
                        <td>周三</td>
                        <td>周四</td>
                        <td>周五</td>
                        <td>周六</td>
                    </tr>
                    <tr class="tr" style="height: 50px;">
                        @foreach($riqi as $k=>$v)
                        <td  style="height: 50px" >{{$v}}</td>
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    @if($status == 1)
        <a href="javascript:void(0)" class="btn">已签到</a>
        <p align="center">请明天再来签到</p>
    @else
        <a href="javascript:void(0)" class="btn but">签到</a>
    @endif
    <div class="container">
        <h1>签到信息</h1>
        <p>当前拥有积分：<span class="fen">{{$integral['integral']}}</span>分</p>
        <p>连续签到次数：<span class="num">{{$continuous['continuous']+0}}</span>次</p>
    </div>
    <!-- /.container -->
    <div class="container">
        <div class="align"><i class="icon-pencil-circled"></i></div>
        <h1>签到规则</h1>
        <p>首次签到获得3积分</p>
        <p>连续签到每天增加1积分</p>
        <p>连续签到16天及以上每天增加2积分</p>
        <p>如果中间有一天间断未签到的，重先开始计算连续签到时间。</p>
        <!-- Three columns -->

    <!-- /.container -->
</section>
<hr>

<!-- Loading the javaScript at the end of the page -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/site.js"></script>
<script>
    $(function(){
        var date = new Date();
        var day = date.getDate();
        var td = $('.tr td');
        $.each(td,function(i,n){
            if($(this).html() == day)
            {
                $(this).addClass('on');
            }
        })
        $('.but').click(function(){
            $.ajax({
                type: "get",
                url: "checkInAdd",
                success: function(msg){
                    var fen = Number($('.fen').html()) + 3;
                    var num = Number($('.num').html()) + 1;
                    if(msg == 2 || msg == 3)
                    {
                        alert('签到成功');
                        $('.fen').html(fen);
                        $('.num').html(num);
                    }
                    if(msg == 4)
                    {
                        alert('签到成功');
                        $('.fen').html(fen + 1);
                        $('.num').html(num);
                    }
                    if(msg == 5)
                    {
                        $('.fen').html(fen +2);
                        $('.num').html(num);
                    }
                    $('.but').removeClass('but').html('已签到');

                }
            });
        })
    })
</script>
</body>
</html>
