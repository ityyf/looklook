<?php
namespace  App\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
//require_once dirname(__DIR__)."\libraries\Integral.php";
/**
 * Class Integral 积分添加方法
 */
class Integral extends Model
{
    public function addIntegral($userId,$num)
    {
        $re = DB::table('user')->where(['user_id'=>$userId])->increment('integral','integral'+$num);
        return $re;
    }
    
    
}
