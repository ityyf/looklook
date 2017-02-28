<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;
use Illuminate\Support\Facades\Input;
use App\Http\Article;
class IndexController extends BaseController
{
    
    /**
     * [前台首页]
     * @return [type] [前台首页]
     */
     public function index(){
        $user_id=session('user_id');
        $type_id=Input::get('type_id');
        $title=Input::get('search');
        $where='1';
        if( $type_id!='' && $type_id!='all' ){
            $where.=" and article.type_id=$type_id";
        }else{
            $type_id='all';
        }
        if( $title!=''){
            $where.=" and article_name like '%$title%'";
        }
        $orderby=base64_decode(Input::get('orderby'));
        if($orderby==''){
            $orderby='publish_time';
        }
        $type = DB::table('article_type')->get();
        $offest=15;
        $article = DB::table('article')
            ->select('article.article_id','reply_num','article_name','like','page_views','head_img','status','type_name','publish_time')
            ->whereIn('status', [1,4])
            ->orderBy($orderby,'desc')
            ->join('article_type', 'article.type_id', '=', 'article_type.type_id')
            ->whereRaw($where)
            ->paginate($offest);
        $num=DB::select("select count(*) as num from article where $where and status in(1,4)");
        $pages=ceil(($num[0]['num']/$offest))?ceil($num[0]['num']/$offest):1;
        $nowpage=Input::get('page')?Input::get('page'):1;
        return view("Index.index",['type'=>$type,'title'=>$title,'orderby'=>base64_encode($orderby),'type_id'=>$type_id,'article'=>$article,'type_id'=>$type_id,'pages'=>$pages,'nowpage'=>$nowpage]);
    }


    public function  askforData(){
        $type=Input::get('type_id');
        $page=Input::get('page');
        $last_id=Input::get('last_id');
        $where='1';
        if( $type!='' && $type!='all' ){
            $where.=" and article.type_id=$type";
        }
//        $type = DB::table('article_type')->get();
//        $article = DB::table('article')
//            ->select('article.article_id','reply_num','article_name','like','page_views','head_img','status','type_name')
//            ->whereIn('status', [1,4])
//            ->orderBy('publish_time')
//            ->join('article_type', 'article.type_id', '=', 'article_type.type_id')
//            ->whereRaw($where)
//            ->limit(20)
//            ->get();
        $limit=($page-1)*20;
        $article=DB::select("select article.article_id,reply_num,article_name,`like`,page_views,head_img,`status`,type_name from article inner join article_type on article.type_id=article_type.type_id where status in (1,4) and $where limit $limit,20");
        echo json_encode($article);

    }

    /*************************************  韩浩杰 ************************************************/
    /**
     * 文章详情
     */
    public function zhengwen(){
        $user_id=session('user_id');
        //文章内容
        $article_id = Input::get('article_id');
        $obj=new Article();
        $obj->page_view($article_id);
        $article = DB::table("article")->where('article_id','=',$article_id)->first();
        $user = DB::table("user")->where('user_id','=',$article['author_id'])->first();
        $article['author_info'] = $user;

        //判断是否收藏
        if($user_id){
            $re=DB::select("select user_collect_id from user_collect where user_id=$user_id and article_id=$article_id");
            if($re){
                $status='1';    //已收藏
            }else{
                $status='0';    //未收藏
            }
        }else{
            $status='';
        }


        //文章评论
        $reply = DB::table("reply")->where('article_id','=',$article_id)->get();
        $reply = json_decode( json_encode($reply),true );
        foreach($reply as $k=>$v){

            //处理二级回复
            $reply_parent_id = $v['reply_id'];
            $reply_son = DB::table("reply")
                //->select('reply_content')
                ->where('reply_parent_id','=',$reply_parent_id)
                ->get();
            //print_r($reply);die;
            $reply_son = json_decode( json_encode($reply_son),true );
            foreach($reply_son as $kk=>$vv){
                $reply_son[$kk]['reply_content'] = str_replace('{{reply_id}}',$reply_son[$kk]['reply_id'],$reply_son[$kk]['reply_content']);
            }
            $reply[$k]['son'] = $reply_son;

            //处理一级回复 用户信息（用户名称、用户头像）
            $user_id = $v['user_id'];
            $user = DB::table("user")
                ->select('user_name','user_photo','user_email')
                ->where("user_id",'=',$user_id)
                ->first();
            $reply[$k]['user_name'] = $user['user_name'];
            $reply[$k]['user_photo'] = $user['user_photo'];
            $reply[$k]['user_email'] = $user['user_email'];
            //print_r($user_id);die;
        }
        $str = '';

        return view("Index.detail",[
            'article' => $article,
            'reply'=>$reply,
            'str'=>$str,
            'reply_num'=>count($reply),
            'status'=>$status
        ]);
    }

    /**
     * @foo 过滤接收的数据  防xss攻击
     * @param string $data
     * @return string
     */
    private function testdata($data){

        $msg = htmlspecialchars($data);
        $msg = strip_tags($msg);
        return $msg;
    }

    /**
     * 评论回复
     */
    public function reply(){

        date_default_timezone_set("PRC");

        //当前用户，即评论or回复人（当前为模拟用户，完了可以从session中取出）
        $user_id = session('user_id');
        $user_name = session("user_email");

        $alldata = Input::all();
        //print_r($alldata);die;

        $addtime = date('Y-m-d H:i:s',time());  //当前时间
        $article_id = $alldata['article_id'];   //文章id

        //判断当前执行的是 回复 还是 评论
        if($alldata['reply_user_id'] == ""){    //为空 当前为评论

            $reply_content = $this->testdata($alldata['reply_content']);
            $res = DB::table("reply")->insert([
                'user_id'=>$user_id,
                'user_name'=>$user_name,
                'article_id'=>$article_id,
                'reply_content'=>$reply_content,
                'addtime'=>$addtime
            ]);
            //更新article表中的评论数量reply_num
            /*$sql = "update article set reply_num = reply_num+1 where article_id = $article_id";
            $res1 = DB::select($sql);*/

            if($res){
                die( "<script>location.href='zhengwen?article_id=".$article_id."'</script>>" );
            }

        }else{  //不为空 当前为回复

            $templet = <<<LABEL
<div class="pd10">
                            <div class="fl">
                                <a class="comment_name" href="user_info?user_id={{user_id}}" user_id="{{user_id}}" >{{user_name}}</a>回复
                                <a class="comment_name" href="user_info?user_id={{reply_user_id}}" user_id="{{reply_user_id}}">{{reply_user_name}}</a>
                                <span>{{addtime}}</span>
                            </div>
                            <span class="reply_content">{{reply_content}}</span>
                            <div class="reply" reply_idorparent="{{reply_id}}" reply_ort="2">[回复]</div>
                        </div>
LABEL;
            $reply_user_id = $alldata['reply_user_id'];
            $reply_user_name = $alldata['reply_user_name'];
            $reply_content = $alldata['reply_content'];

            $content = str_replace("{{user_id}}",$user_id,$templet);
            $content = str_replace("{{user_name}}",$user_name,$content);
            $content = str_replace("{{reply_user_id}}",$reply_user_id,$content);
            $content = str_replace("{{reply_user_name}}",$reply_user_name,$content);
            $content = str_replace("{{addtime}}",$addtime,$content);
            $content = str_replace("{{reply_content}}",$reply_content,$content);
            $content = $this->testdata($content);

            $reply_ort = $alldata['reply_ort']; //评论等级 1:一级回复(入库) 2:二级回复(更新)
            if($reply_ort==1){  //入库

                $reply_parent_id = $alldata['reply_idorparent'];
                $sql = "insert into reply(user_id,reply_content,reply_parent_id,addtime)values($user_id,'$content',$reply_parent_id,'$addtime')";
                $res = DB::select($sql);
                //var_dump($res);
                die( "<script>location.href='zhengwen?article_id=".$article_id."'</script>>" );
            }else if($reply_ort == 2){  //更新

                $reply_id = $alldata['reply_idorparent'];
                $sql = "update reply set reply_content = concat(reply_content,'$content') where reply_id = $reply_id";

                $res = DB::select($sql);
                //var_dump($res);
                die( "<script>location.href='zhengwen?article_id=".$article_id."'</script>>" );
            }
        }

        //echo $content;
        //print_r($alldata);
    }

    /**
     * 点赞文章
     */
    public function user_like_article(){
        //模拟用户
        $user_id = session('user_id');

        //接收文章id
        $alldata = Input::all();
        $article_id = $alldata['article_id'];


        //判断是否赞过
        $sql = "select * from user_like_article where user_id = $user_id and article_id = $article_id";
        $res = DB::select($sql);
        if( !empty($res) ){
            die("1");
        }

        //入点赞库
        $sql = "insert into user_like_article(article_id,user_id)values($article_id,$user_id)";
        $res = DB::select($sql);

        //更新article表 点赞数量
        $sql = "update article set `like`=`like`+1 where article_id = $article_id";
        $res1 = DB::select($sql);

        die('0');

    }

    /**
     * 收藏文章
     */
    public function collect(){
        //模拟用户
        $user_id = session('user_id');
        if(empty($user_id)){
            die('3');   //非法登录
        }

        //接收文章id
        $article_id = Input::get("article_id");
        $status=Input::get('status');
        if($status=='1'){
            //取消收藏
            $sql = "delete from user_collect where user_id=$user_id and article_id=$article_id";
        }else{
            //添加收藏
            $sql = "insert into user_collect(user_id,article_id) value($user_id,$article_id)";
        }
        
        $res = DB::select($sql);
        if(!$res){
            die('1');  
        }else{
            die('0');
        }

    }

    /**
     * 关注作者
     */
    public function attentd(){
        //模拟用户
        $user_id = session("user_id");

        if(empty($user_id)){
            die('3');   //尚未登录
        }

        //接收作者id
        $author_id = Input::get("author_id");

        $time = date('Y-m-d H:i:s',time());

        $sql = "select * from attentd where your_id = $author_id and my_id = $user_id";
        $res = DB::select($sql);

        if( !empty($res) ){
            die('1');   //已经 关注 过了
        }

        $res = DB::table("attentd")->insert([
            'my_id' => $user_id,
            'your_id' => $author_id,
            'addtime' =>$time,
        ]);

        die(0);
    }
    
    /**
     * 举报文章
     */
    public  function  report(){
        $article_id=Input::get('article_id');
        DB::select("update article set report_num=report_num+1 where article_id=$article_id");
    }
/**
     * 发表评论的用户详情信息
     */
    public function user_info(){
        $user_id=Input::get('user_id');
        $user = DB::table('user')
            ->select("*")
            ->where('user_id', '=', $user_id)
            ->first();
        $article = DB::table('article')
            ->where("author_id",'=',$user_id)
            ->select("*")
            ->get();

        $my_id = session("user_id");
        if(empty($my_id)){
            $my_id = '-1';
        }
        $sql = "select * from attentd where my_id = $my_id and your_id = $user_id";
        $attentd = DB::select($sql);
        if($attentd){
            $is_attentd = '1';    //已关注
        }else{
            $is_attentd = '0';    //未关注
        }
        
        return view('Index/user_info',[
            'user'=>$user,
            'article'=>$article,
            'is_attentd'=>$is_attentd
        ]);
    }
    
    /**
     * 隐私政策
     */
    public  function  serect(){
        return view('Index.serect');
    }

    /**
     * 关于我们
     */
    public  function  about(){
        return view('Index.about');
    }


    /**
     * 友情链接
     */
    public  function  friendlyLink(){
        return view('Index.flink');
    }

    


}
