<?php
namespace  App\Http;
use Illuminate\Database\Eloquent\Model;
/**
 * Signup form
 */
class Music extends Model
{
    /**
     * @文件上传
     */
    public function up_music($data)
    {
//        print_r($data);die;
        if(empty($data)){
            echo  "<script>alert('请选择背景音乐');history.go(-1)</script>";die;//代表类型不对
        }
        if(substr($data['name'],-3)!='mp3'){
            echo  "<script>alert('请上传MP3格式音乐');history.go(-1)</script>";die;//代表类型不对
        } else if($data['size']>10485760){
            echo  "<script>alert('音乐文件过大');history.go(-1)</script>";die;//代表图片过大
        }else if($data['error']!=0){
            echo  "<script>alert('图片上传遇到错误');history.go(-1)</script>";die;//代表图片上传遇到错误
        }else{
            $type=substr($data['name'],strripos($data['name'],'.'));
            if(!file_exists('../../curl_music/'.date('Ymd'))){
                mkdir('../../curl_music/'.date('Ymd'));
            }
            $music_name='curl_music/'.date('Ymd').'/'.time().rand(1000,9999).$type;
            file_put_contents('../../'.$music_name,file_get_contents($data['tmp_name']));
            return $music_name;//背景音乐上传成功
        }
    }



}
