<div class="asort">
    <div class="hd">
        <div class="wrap">
            <div class="fl"><span>选择排序</span><div class="clear"></div></div>
            <div class="fr"></div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="ct">
        <div class="wrap">
            <ul class="choose_sort">
                <li s_data="like"><i class="s"></i><a href="{{url('/')}}?orderby=bGlrZQ==&type_id=<?php if(isset($type_id)){echo $type_id;}else{echo 'all';} ?>" class='a_type'>最多喜欢</a>
                    <a href="{{url('/')}}?orderby=bGlrZQ==&type_id=<?php if(isset($type_id)){echo $type_id;}else{echo 'all';} ?>"><i class="e"></i></a></li>
                <li s_data="view"><i class="s"></i><a class='a_type' href="{{url('/')}}?orderby=cGFnZV92aWV3cw==&type_id=<?php if(isset($type_id)){echo $type_id;}else{echo 'all';} ?>" >最多浏览</a><a
                            href="{{url('/')}}?orderby=cGFnZV92aWV3cw==&type_id=<?php if(isset($type_id)){echo $type_id;}else{echo 'all';} ?>"><i class="e"></i></a></li>
                <li s_data="comment"><i class="s"></i><a class='a_type' href="{{url('/')}}?orderby=cmVwbHlfbnVt&type_id=<?php if(isset($type_id)){echo $type_id;}else{echo 'all';} ?>">最多评论</a>
                    <a href="{{url('/')}}?orderby=cmVwb3J0X251bQ==&type_id=<?php if(isset($type_id)){echo $type_id;}else{echo 'all';} ?>"><i class="e"></i></a></li>
                <li s_data="laster"><i class="s"></i><a class='a_type' href="{{url('/')}}">最新发布</a><a href="{{url('/')}}"><i class="e"></i></a></li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
</div>