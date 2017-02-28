
        <li class="next {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a <?php if($nowpage==1){ ?> href="#"  <?php }else{ ?> href="{{$paginator->url($paginator->currentPage()-1)}}&type_id={{$type_id}}&orderby={{$orderby}}&search={{$title}}" <?php } ?>>
                上一页
                <i class="chevron right icon"></i>
            </a>
        </li>
        <li class="next {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <?php if($nowpage!=$pages){ ?>
            <a  href="{{ $paginator->url($paginator->currentPage()+1) }}&type_id={{$type_id}}&orderby={{$orderby}}&search={{$title}}">
                下一页
                <i class="chevron right icon"></i>
            </a>
            <?php }else{ ?>
                <a href="#">
                   没有了
                    <i class="chevron right icon"></i>
                </a>
            <?php } ?>

        </li>

