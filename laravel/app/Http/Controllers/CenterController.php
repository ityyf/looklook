<?php

namespace App\Http\Controllers;

use App\Http\Slice;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Upload;
use App\Http\Article;
class CenterController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 首页
     *    shh
     */
    public function index(){
        $user_id=session('user_id');
        $article = DB::table('article')
            ->select('article.article_id','reply_num','article_name','like','page_views','head_img','status','type_name','publish_time')
            ->orderBy('publish_time','desc')
            ->join('article_type', 'article.type_id', '=', 'article_type.type_id')
            ->where("author_id",$user_id)
            ->get();
	    $file_dir='http://www.hanhaojie.cn/curl_image/system/';
        $json_string = file_get_contents($file_dir.'system.txt');

        $user = DB::table('user')
            ->select("*")
            ->where('user_id', '=', $user_id)
            ->first();

        // 把JSON字符串转成PHP数组
        $foot = json_decode($json_string, true);
        return view("Center.center",[
            'article'=>$article,
            'foot'=>$foot,
            'user'=>$user
        ]);
    }
    /**
     * 发布文章
     *     bjq
     */
    public function addArticle(){
        $user_id=session('user_id');
        $status=DB::select("select user_status from user  where user_id=$user_id");
        if($status[0]['user_status']==1){
            echo "<script>alert('您的账号由于违规操作已被锁定，暂不能发布文章!');location.href='center'</script>";die;

        }
        $type=DB::table('article_type')->get();
        return view('Center/addArticle',['type'=>$type]);
    }


     /**
     * 文章添加入库
      *    bjq
     */
    public function add_pro(){
        $user_id=session('user_id');
        $data=Input::get();
        // print_r($data);die;
        $obj=new Upload();
        $re=$obj->up_img($_FILES['head_img']);
        $data['img_name']=$re;
        $checkData=new Article();
        $data=$checkData->check($data);
      
        if(isset($data['drafts']) && $data['drafts']==1){
             $id = DB::table('article')->insertGetId([
                'article_name' => $data['title'],
                'intro' => $data['intro'],
                'type_id' => $data['type'],
                'keywords' => $data['keywords'],
                'article_content' => $data['editorValue'],
                'author_id' => $user_id,
                'publish_time' => date('Y-m-d'),
                'head_img'=>$data['img_name'],
                'status'=>0 ]);
             if($id){
                return redirect('center');
            }else{
                echo "<script>alert('添加失败');history.go(-1)</script>";
            }
        }else{
            // print_r($data);die;
            $id = DB::table('drafts')->insertGetId(
            [
                'article_name' => $data['title'],
                'intro' => $data['intro'],
                'type_id' => $data['type'],
                'keywords' => $data['keywords'],
                'article_content' => $data['editorValue'],
                'user_id' => $user_id,
                'head_img'=>$data['img_name']
            ] 
        );
            if($id){
                return redirect('draft');
            }else{
                echo "<script>alert('添加失败');history.go(-1)</script>";
            }

        }
        
    }

    /**
     * 我的动态
     *    shh
     */
    public function condition(){

        //session获取用户ID
        $user_id = session('user_id');

        //用户详情信息
        $users = DB::table('user')
            ->select('*')
            ->where('user_id', '=', $user_id)
            ->get();

        //关注人信息
        $attentd = DB::table('attentd')
            ->select('your_id')
            ->where('my_id', '=', $user_id)
            ->get();

        $your = [];
        if(!empty($attentd)){
            foreach ($attentd as $key => $value) {
                $your[] = DB::table('user')
                    ->select('*')
                    ->where('user_id', '=', $value['your_id'])
                    ->get();
            }
        }

        $reply_article = DB::table('reply')
            ->join('article', 'reply.article_id', '=', 'article.article_id')
            ->select('*')
            ->where('user_id','=',$user_id)
            ->get();

        return view('Center/condition',[
            'user'=>$users,
            'your'=>$your,
            'article'=>$reply_article
        ]);

    }
    /**
     * 我的收藏
     *      bjq
     */
    public function collect(){

        $user_id=session('user_id');

        //收藏的文章
        $sql = "select article.article_id,reply_num,article_name,`like`,page_views,head_img,`status`,type_name,publish_time from article  INNER JOIN article_type on article.type_id=article_type.type_id where article_id in (select article_id from user_collect where user_id=$user_id)";
        $article = DB::select($sql);

        //底部信息
     	$file_dir='http://www.hanhaojie.cn/curl_image/system/';
        $json_string = file_get_contents($file_dir.'system.txt');
        // 把JSON字符串转成PHP数组
        $foot = json_decode($json_string, true);

        //print_r($article);die;
	    return view("Center.collect",['article'=>$article,'foot'=>$foot]);

    }

    /**
     * @return 我的私信
     *     lml
     */
    public function private_latter(){
        $user_id=Input::get("user_id");
        return view("Center.private",['user_id'=>$user_id]);
    }

    public function add_private()
    {
        $id=session()->get("user_id");
        $title=Input::get("title");
        $private=Input::get("editorValue");
        $user_id=Input::get("user_id");
        $_token=Input::get("_token");
        $data=date("Y-m-d H:s:i");
        $res = DB::table('private')->insertGetId([
            "my_id"=>$id,
            "user_id"=>$user_id,
            "private"=>"",
            "pid"=>0,
            "add_time"=>$data,
            "title"=>$title
        ]);
        $arr = DB::table('private')->insertGetId([
            "my_id"=>$id,
            "user_id"=>$user_id,
            "private"=>$private,
            "pid"=>$res,
            "add_time"=>$data,
            "title"=>""
        ]);
        if($arr){
            return redirect('private_list');
        }else{
            echo "<script>alert('发送失败');window.history.back();</script>";
        }
    }
    /*
     * 私信标题列表
     *     lml
     */
    public function private_list()
    {
        $id=session()->get("user_id");
        $data = DB::select(
                            "select private_id,private,my_id,private.user_id,private,add_time,title,pid,user_name,user_email 
                            from private 
                            INNER JOIN user on user.user_id =private.my_id 
                            where pid=0 && (my_id=$id or private.user_id=$id)");
        return view("Center.private_list",["data"=>$data]);

    }
    /*
     * 查看私信详情
     *       lml
     */
    public function private_connect()
    {
        $private_id=Input::get("private_id");

        $res = DB::select("select private_id,private,my_id,private.user_id,private,add_time,title,pid,user_name,user_email from private INNER JOIN user on user.user_id =private.my_id where pid=$private_id  order by add_time asc");
        return view("Center.private_connect",["res"=>$res]);
    }

    /*
     * 回复私信
     *      lml
     */
    public function reply_private()
    {
        $pid=Input::get("pid");
        $private=Input::get("lala");
        $data=date("Y-m-d H:s:i");
        $id=session()->get("user_id");
        $user_id=Input::get("user_id");
        $_token=Input::get("_token");
        $arr = DB::table('private')->insertGetId([
            "my_id"=>$id,
            "user_id"=>$user_id,
            "private"=>$private,
            "pid"=>$pid,
            "add_time"=>$data,
            "title"=>""
        ]);
        if($arr){
            echo 1;
        }else{
            echo 0;
        }

    }
    /**
     * 草稿
     *    bjq
     */
    public function  draft(){
        $user_id=session('user_id');
        $arr=DB::select("select * from drafts inner join article_type on drafts.type_id=article_type.type_id where user_id=$user_id ");
        return view('Center.drafts',['article'=>$arr]);
    }
    /**
     * 草稿详情
     *    bjq
     */
    public function  draft_detail(){
        $type=DB::select("select * from article_type");
        $drafts_id=Input::get('drafts_id');
        $arr=DB::select("select * from drafts inner join article_type on drafts.type_id=article_type.type_id where drafts_id=$drafts_id ");
        // print_r($arr[0]);die;
        return view('Center.draftsdetail',['article'=>$arr[0],'type'=>$type,'drafts_id'=>$drafts_id]);
    }

    /**
     * 修改草稿
     *    bjq
     */
    
    public function up_draft(){
        $data=Input::get();
        $drafts_id=Input::get('drafts_id');
        if($_FILES['head_img']['error']!=4){
            $obj=new Upload();
            $re=$obj->up_img($_FILES['head_img']);
            $data['img_name']=$re;
        }else{
            $arr=DB::select("select head_img from drafts where drafts_id=$drafts_id ");
            $data['img_name']=$arr[0]['head_img'];
        }
        $user_id=session('user_id');
        $checkData=new Article();
        $data=$checkData->check($data);
        if(isset($data['drafts']) && $data['drafts']==1){

             $id = DB::table('article')->insertGetId([
                'article_name' => $data['title'],
                'intro' => $data['intro'],
                'type_id' => $data['type'],
                'keywords' => $data['keywords'],
                'article_content' => $data['editorValue'],
                'author_id' => $user_id,
                'publish_time' => date('Y-m-d'),
                'head_img'=>$data['img_name'],
                'status'=>0 ] );
              DB::select("delete from drafts where drafts_id=$drafts_id");
            if($id){
                return redirect('center');
            }else{
                echo "<script>alert('操作失败');history.go(-1)</script>";
            }
        }else{
            // print_r($data);die;
            $id = DB::table('drafts')->where('drafts_id',$drafts_id)->update([
                'article_name' => $data['title'],
                'intro' => $data['intro'],
                'type_id' => $data['type'],
                'keywords' => $data['keywords'],
                'article_content' => $data['editorValue'],
                'user_id' => $user_id,
                'head_img'=>$data['img_name']] );
            if($id){
                return redirect('draft');
            }else{
                echo "<script>alert('操作失败');history.go(-1)</script>";
            }
        }
       

    }

    /**
     * 我的关注
     *      hhj
     */
    public function friend(){
        $user_id = session('user_id');
        $sql = "select * from attentd where my_id = $user_id";
        $res = DB::select($sql);
        $arr = [];
        if( !empty($res) ){
            foreach($res as $k=>$v){
                $your_id = $v['your_id'];
                $res1 = DB::table("user")->where("user_id","=",$your_id)->first();
                $arr[$k] = $res1;

                $article_num = DB::table("article")->where("author_id","=",$your_id)->count();
                $arr[$k]['article_num'] = $article_num;

                $fans_num = DB::table("attentd")->where("your_id","=",$your_id)->count();
                $arr[$k]['fans_num'] = $fans_num;

            }
        }
        return view("Center/attentd",[
            'users' => $arr
        ]);
    }

    /**
     * 取消关注
     *      hhj
     */
    public function clear_attentd(){

        //模拟用户
        $user_id = session('user_id');

        //接收作者id
        $author_id = Input::get("author_id");

        $sql = "delete from attentd where your_id=$author_id and my_id = $user_id";
        $res = DB::select($sql);
        
        die("ok");
    }

    /**
     * 个人资料
     *     shh
     */
    public function information(){
	//模拟用户
        $user_id = session('user_id');
        $info = DB::table('user')
            ->select('*')
            ->where('user_id', '=', 1)
            ->get();

        $users = DB::table('areas')
            ->select(['area_id','area_name'])
            ->where('parent_id', '=', 0)
            ->get();

        //底部设置
        // 从文件中读取数据到PHP变量
        $file_dir='http://www.hanhaojie.cn/curl_image/system/';
        $json_string = file_get_contents($file_dir.'system.txt');
        
        // 把JSON字符串转成PHP数组
        $foot = json_decode($json_string, true);
        
        return view("Center/information",['data'=>$users,'foot'=>$foot,'info'=>$info]);
    }
    /**
     * 用户详情信息入库
     *      shh
     */
    public function user_information(){
        //获取登录用户的信息
        $user_id=request()->session()->get('user_id');

        $user_name=Input::get("user_name");
        $user_sex=Input::get("user_sex");
        $user_birth=Input::get('user_birth');
        $user_address=Input::get("user_address");
        //去地区表中查看具体的地址
        $data = DB::table('areas')
            ->select("area_name")
            ->where('area_id', '=', $user_address)
            ->get();
        foreach ($data as $key=>$val){
            $user_address=$val['area_name'];
        }
        $info=DB::table('user')
            ->where('user_id', $user_id)
            ->update(
                [
                    'user_name' => "$user_name",
                    'user_sex' => "$user_sex",
                    'user_birth'=>"$user_birth",
                    'user_address'=>"$user_address"
                ]);
        if($info){
            echo 1;
        }else{
            echo 0;
        }
    }
    /**
     * 修改头像
     *    shh
     */
    public function head(){
        //获取登录用户的信息
        $user_id=session('user_id');
        //头像图片的展示
        $photo = DB::table('user')
            ->select("user_photo")
            ->where('user_id', '=',$user_id )
            ->get();
        foreach ($photo as $key=>$val){
            $arr['user_photo']=$val['user_photo'];
            if($arr['user_photo']==''){
                $arr['code']=1;
            }else{
                $arr['code']=11;
            }
        }
        //展示所有的头像
        for($i=1;$i<=60;$i++) {
            $img[] = "curl_image/head/$i.jpg";
        }
        return view("Head/head",array('photo'=>$arr,'img'=>$img));
    }
    /**
     * 头像的极点即改
     *      shh
     */
    public function image_update(){
        $src=Input::get("src");
        //获取登录用户的信息
        $user_id=request()->session()->get('user_id');

        $info=DB::table('user')
            ->where('user_id', $user_id)
            ->update(
                [
                    'user_photo' => "$src"
                ]);
        if($info==1){
            $data['code']=1;
            $data['img']=$src;
            echo json_encode($data);
        }else{
            $data['code']=0;
            echo json_encode($data);
        }
    }
    /**
     * 修改头像入库
     *      shh
     */
    public function update_head(){
        //获取登录用户的信息
        $user_id=request()->session()->get('user_id');

        $file=$_FILES['file'];
        $file_dir='../../';
        $file_name="curl_image/head/".rand(10000,999999).$file['name'];
        $info=move_uploaded_file($file['tmp_name'],$file_dir.$file_name);
        if($info){
            $info=DB::table('user')
                ->where('user_id', $user_id)
                ->update(
                    [
                        'user_photo' => "$file_name"
                    ]);
            if($info){
                echo "<script>alert('修改头像成功！');history.back(-1);</script>";
            }else{
                echo "<script>alert('修改头像失败！');history.back(-1);</script>";
            }
        }else{
            echo "<script>alert('修改头像失败！');history.back(-1);</script>";
        }
    }
    /**
     * 修改密码
     *     shh
     */
    public function password(){
        return view("Center/password");
    }
    /**
     * 修改密码入库
     *      shh
     */
    public function update_password(){
        //获取登录用户的信息
        $user_id=request()->session()->get('user_id');

        $old_password=Input::get("old_password");
        $new_password=Input::get("new_password");
        $users = DB::table('user')
            ->select("user_pwd")
            ->where('user_id', '=', $user_id)
            ->get();
        foreach ($users as $key=>$val){
            if($val['user_pwd']==md5($old_password)){
                $info=DB::table('user')
                    ->where('user_id', $user_id)
                    ->update(
                        [
                            'user_pwd' => md5($new_password)
                        ]);
                if($info){
                    echo 10001;
                }else{
                    echo 10000;
                }
            }else{
                echo 10002;
            }
        }


    }

    /**
     *  评论的文章
     *      hhj
     */
    public function comment(){
        $user_id = session("user_id");
        $sql = "select * from reply where user_id = $user_id and article_id != ''";
        //$reply = DB::table("reply")->where('user_id','=',$user_id)->get();
        $reply = DB::select($sql);
        $reply = json_decode( json_encode($reply),true );
        foreach($reply as $k=>$v){
            $article_id = $v['article_id'];
            $article = DB::table("article")->select(['article_name','head_img'])->where('article_id','=',$article_id)->first();
            $reply[$k]['article_name'] = $article['article_name'];
            $reply[$k]['head_img'] = $article['head_img'];
        }
//        print_r($reply);die;

        return view("Center.myreply",[
            'reply'=>$reply
        ]);
    }
    /***
     * 好友亲密度
     * 规则私信一条亲密度增加10%;
     */
    public function Intimacy()
    {
        /**
         * 谁在意我
         */
        //用户ID
        $user_id = session("user_id");
        $your_id = DB::table('attentd')->where('my_id',$user_id)->select('your_id')->get();
        $array = [];
        foreach ($your_id as $key=>$val)
        {

                //查询用户信息
                $your_id = $val['your_id'];
                $user = DB::table('user')->where('user_id',$your_id)->select('user_photo','user_name')->first();
                $array[$key]['user_info'] = $user;
                $array[$key]['intimacy']=DB::table('private')->where('my_id',$your_id)->where('pid',0)->count();
                $intimacy = array();
                foreach ($array as $array1)
                {
                    $intimacy[]=$array1['intimacy'];
                }
                array_multisort($intimacy, SORT_DESC, $array);

        }
        foreach ($array as $k=>$val)
        {
            switch ($val['intimacy'])
            {
                case 0:$array[$k]['intimacy']='0%';break;
                case 1:$array[$k]['intimacy']='5%';break;
                case 2:$array[$k]['intimacy']='10%';break;
                case 3:$array[$k]['intimacy']='15%';break;
                case 4:$array[$k]['intimacy']='20%';break;
                case 5:$array[$k]['intimacy']='25%';break;
                case 6:$array[$k]['intimacy']='30%';break;
                case 7:$array[$k]['intimacy']='35%';break;
                case 8:$array[$k]['intimacy']='40%';break;
                case 9:$array[$k]['intimacy']='45%';break;
                case 10:$array[$k]['intimacy']='50%';break;
                case 11:$array[$k]['intimacy']='55%';break;
                case 12:$array[$k]['intimacy']='60%';break;
                case 13:$array[$k]['intimacy']='65%';break;
                case 14:$array[$k]['intimacy']='70%';break;
                case 15:$array[$k]['intimacy']='75%';break;
                case 16:$array[$k]['intimacy']='80%';break;
                case 17:$array[$k]['intimacy']='85%';break;
                case 18:$array[$k]['intimacy']='90%';break;
                case 19:$array[$k]['intimacy']='95%';break;
                case 20:$array[$k]['intimacy']='100%';break;
                default:$array[$k]['intimacy']='100%';break;
            }
        }
        $array = array_slice($array,0,5);
        return view('Center.intimacy',['array'=>$array]);
    }
    
}