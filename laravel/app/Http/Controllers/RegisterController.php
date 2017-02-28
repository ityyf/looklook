<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use App\WXBizMsgCrypt;
class RegisterController extends BaseController
{
    /**
     * [前台首页]
     * @return [type] [前台首页]
     */
    public function add()
    {
//        $arr = Input::get();
        $num = rand(0,10000);
        session(['num'=>$num]);
        Mail::raw("感谢您注册看看吧，你本次的验证码是".$num.",请在60秒内完成验证。",function ($message){
            //发件地址  发件人
            $email=Input::get('user_email');
            $message->from("1173576854@qq.com","看看吧注册");
            //主题
            $message->subject('你收到的验证码是');
            //发送给谁
            $re=$message->to($email);
            if($re){
                echo 1;
            }else{
                echo 0;
            }
        });

    }
   public function register_add(){
        $email=Input::get('user_email');
        $pwd=Input::get('user_pwd');
        $check=Input::get('check');
        $yanzheng=session("num");
        $res = DB::table("user")->where('user_email',$email)->first();
        if($res){
            echo "<script>alert('邮箱已经存在');window.history.back();</script>";
        }else{
            if($check==$yanzheng){
                session()->forget("num");
                $re=DB::table('user')->insertGetId(['user_email'=>$email,'user_pwd'=>MD5($pwd),'user_photo'=>'curl_image/head/none.jpg']);
                if($re){
		  session(['user_id'=>$re]);
                	  session(['user_email'=>$email]);
                    echo 1;
			
                }else{
                    echo 0;
                }
            }else{
                echo 2;
            }
        }
    }
    public function only_name(){
        $email=Input::get('user_email');
        $res = DB::table("user")->where('user_email',$email)->first();
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function check()
    {
        $check=Input::get('check');
        $token=session("num");
        if($check==$token){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function login()
    {
        $email=Input::get('user_email');
        $location=Input::get('location');
        $pwd=Input::get('user_pwd');
        $res = DB::table("user")->where('user_email',$email)->first();
        if($res){
            if(($res['user_pwd'])==md5($pwd)){
                session(['user_id'=>$res['user_id']]);
                session(['user_email'=>$res['user_email']]);
                if($location!=''){
                        echo "<script>location.href='zhengwen?article_id=$location'</script>";
                }else{
                    return redirect('/');
                }
            }else{
                echo "<script>alert('密码错误');window.history.back();</script>";
            }
        }else{
            echo "<script>alert('用户名不存在');window.history.back();</script>";
        }

    }



    /**
     * 用户登录单独页面
     */
    public function  user_login(){
        $type = DB::table('article_type')->get();
        return view('Login.login',['type'=>$type]);
    }


    public function up_pwd()
    {
        return view('Register.pwd');
    }
    public function check_pwd()
    {
        $email=Input::get('user_email');
        $pwd=Input::get('user_pwd');
        $check=Input::get('check');
        $yanzheng=session("num");
        if($check==$yanzheng){
            session()->forget("num");
            $re=DB::table('user')->where("user_email",$email)->update(['user_pwd'=>md5($pwd)]);
            if($re){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            echo 2;
        }
    }

    /**
     * 获取微信用户信息
     */
    
     public function weixin_login(){
        $code= Input::get('code');
        $cor_id="wx35a3248ac8d8458e";
        $serect="hBfxA_a9BbFp6Em_xtldF3DV41fwQD0dt-T4dT4_F7wdg18BQYYO2Mru8-8b58v2";
        $token=file_get_contents("https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$cor_id&corpsecret=$serect");
        $access_token=json_decode($token);
        $access_token=$access_token->access_token;
        $data= file_get_contents("https://qyapi.weixin.qq.com/cgi-bin/user/getuserinfo?access_token=$access_token&code=$code");
        $data=json_decode($data);
        $UserId=$data->UserId;
        session()->forget("user_id");
        $res=DB::select("select user_id from user where user_email='$UserId' limit 1");
        if($res){
            session(['user_id'=>$res[0]['user_id']]);
	   session(['user_email'=>$UserId]);	
            return redirect('/');
        }else{
            $id=DB::table('user')->insertGetId(['user_email'=>$UserId,'user_status'=>'10000','user_photo'=>'curl_image/head/none.jpg']);
            if($id){
                session(['user_id'=>$id]);
	       session(['user_email'=>$UserId]);	
                return redirect('/');
            }else{
                $this->weixin_login();
            }
        }



    }

    /**
     * [weixin_huidiao 回调模式]
     * @return [type] [description]
     */
    public function weixin_huidiao(){

 	   require_once(dirname(__DIR__)."/weixin/WXBizMsgCrypt.php");
            // 假设企业号在公众平台上设置的参数如下
            $encodingAesKey = "Q71Wk5dUulpXasayhMWQHtOHAytlFBS3xI8WoXiqTXY";
            $token = "LCUzfDwnonDLm3aOhYPcizI756H4D";
            $corpId = "wx35a3248ac8d8458e";
            $sVerifyMsgSig = $_REQUEST['msg_signature'];
            $sVerifyTimeStamp = $_REQUEST['timestamp'];
            $sVerifyNonce = $_REQUEST['nonce'];
            $sVerifyEchoStr = $_REQUEST['echostr'];
            $sEchoStr = "";
            $wxcpt = new WXBizMsgCrypt($token, $encodingAesKey, $corpId);
            $errCode = $wxcpt->VerifyURL($sVerifyMsgSig, $sVerifyTimeStamp, $sVerifyNonce, $sVerifyEchoStr, $sEchoStr);
            if ($errCode == 0) {
                echo $sEchoStr;
            } else {
                print("ERR: " . $errCode . "\n\n");
            }
    }

}
