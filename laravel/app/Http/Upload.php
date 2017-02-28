<?php
namespace  App\Http;
use Illuminate\Database\Eloquent\Model;
/**
 * Signup form
 */
class Upload extends Model
{
    /**
     * @文件上传
     */
    public function up_img($data)
    {
        if(empty($data)){
            echo  "<script>alert('请选择封面图片');history.go(-1)</script>";die;//代表类型不对
        }
        $img_type=array('image/jpeg','image/jpg','image/png','image/gif');
        if(!in_array($data['type'],$img_type)){
            echo  "<script>alert('图片类型不对');history.go(-1)</script>";die;//代表类型不对
        } else if($data['size']>2048000){
            echo  "<script>alert('图片尺寸过大');history.go(-1)</script>";die;//代表图片过大
        }else if($data['error']!=0){
            echo  "<script>alert('图片上传遇到错误');history.go(-1)</script>";die;//代表图片上传遇到错误
        }else{
            $type=substr($data['name'],strripos($data['name'],'.'));
            if(!file_exists('../../curl_image/'.date('Ymd'))){
                mkdir('../../curl_image/'.date('Ymd'));
            }
            $img_name='curl_image/'.date('Ymd').'/'.time().rand(1000,9999).$type;
            file_put_contents('../../'.$img_name,file_get_contents($data['tmp_name']));
            return $img_name;//代表图片验证没问题
        }
    }
    
     
    
}
