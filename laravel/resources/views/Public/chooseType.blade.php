<div class="asort">
    <div class="hd">
        <div class="wrap">
            <div class="fl"><span>选择分类</span><div class="clear"></div></div>
            <div class="fr"></div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="ct">
        <div class="wrap">
            <ul class="choose_cate">
                <?php $type = DB::table('article_type')->get(); ?>
                <li style="font-weight:700;" c_data="1" style="background:#f7f7f7;"><i style="margin-right:0;background:none;width:0;" class="s"></i><a class='a_type' href='{{url('/')}}'>全部分类</a><a
                            href="{{url('/')}}"><i class="e"></i></a></li>
                @foreach($type as $key=>$val)
                    <li c_data="27"><i style="background:none;width:10px;margin-right:0;" class="s" ></i><a class='a_type' href="{{url('/')}}?type_id=<?php echo $val['type_id'] ?>"><?php  echo $val['type_name']?></a><a
                                href="{{url('/')}}?type_id=<?php echo $val['type_id'] ?>"><i class="e"></i></a></li>
                @endforeach
            </ul>
            <div class="clear"></div>
        </div>
    </div>
</div>