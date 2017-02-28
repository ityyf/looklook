<div id="menu">
    <div class="search_wrap">
        <form action="{{url('/')}}" method="get">
            <input type="hidden" value="{{$type_id}}" name="type_id">
            <input type="hidden" value="{{$orderby}}" name="orderby">
            <input type="text" name="search" value="{{$title}}" class="search_input" placeholder="关键字查找" />
            <i class="reset_input"><i></i></i>
        </form>
    </div>
    <ul>
        <li class="nav_index menu_cur"><a href="{{url('/')}}"><i></i><span>首页</span><b></b><div class="clear"></div></a></li>
        <li class="nav_help"><a href="{{url('help_show')}}"><i></i><span>帮帮忙</span><b></b><div class="clear"></div></a></li>
        <li class="nav_site"><a href="{{url("center")}}"><i></i><span>个人中心</span><b></b><div class="clear"></div></a></li>
    </ul>
</div>