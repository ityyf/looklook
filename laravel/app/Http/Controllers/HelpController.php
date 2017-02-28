<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;
use Illuminate\Support\Facades\Input;

class HelpController extends BaseController
{
    public function help_show(){
        return view("Help.help_show");
    }
    public function help_add()
    {
        $user_id=session()->get("user_id");
        $title=Input::get("title");
        $help_connect=Input::get("editorValue");
        $add_date=date("Y-m-d H:s:i");
        $res = DB::table('help')->insertGetId([
            "user_id"=>$user_id,
            "help_connect"=>$help_connect,
            "add_date"=>$add_date,
            "title"=>$title
        ]);
        if($res){
            echo "<script>alert('感谢您提的意见');window.history.go(-2);</script>";
        }
    }
}