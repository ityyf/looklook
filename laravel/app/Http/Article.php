<?php

namespace  App\Http;
use Illuminate\Database\Eloquent\Model;
use DB;
/**
 * Signup form
 */
class Article extends Model
{
    /**
     * @文件上传
     */
    public function check($data)
    {
        foreach ($data as $key=>$val){
            if(empty($val)){
                   echo "<script>alert( '请完善所有信息');history.go(-1)</script>";die;
            }
        }
        $data['title']=strip_tags($data['title']);
        $data['intro']=strip_tags($data['intro']);
        $data['keywords']=strip_tags($data['keywords']);
        return $data;
    }

    /**
     * 
     */
        public  function  page_view($article_id){
            if(!isset($_COOKIE['view_article_id']) || $_COOKIE['view_article_id']==''){
                setcookie('view_article_id',$article_id);
                // echo $_COOKIE['view_article_id'];
                DB::select("update article set page_views=page_views+1 where article_id=$article_id");
            }else{
                $str=explode(',',$_COOKIE['view_article_id']);
                if(in_array($article_id,$str)){
                }else{
                    DB::select("update article set page_views=page_views+1 where article_id=$article_id");
                    $_COOKIE['view_article_id']=$_COOKIE['view_article_id'].','.$article_id;
                    setcookie('view_article_id',$_COOKIE['view_article_id']);
                }
            }
        }
     
    
}
