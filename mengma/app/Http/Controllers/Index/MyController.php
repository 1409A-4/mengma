<?php
/**
 * Created by PhpStorm.
 * User: 亚男
 * Date: 2016/9/8
 * Time: 17:01
 */
namespace APP\Http\Controllers\Index;
use  Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use session;
use input;
use Validator;
use Redirect;
use Mail;

class MyController  extends Controller{

    /*
    * 用户中心
    * 
    * */

    public function index(){
        $name =\Request::session()->get('name');

        $arr = DB::table('user')->where('uname',$name)->first();

        if($arr){

        }else{
            $arr = DB::table('third')->where('uname',$name)->first();
        }
        $curl = "http://api.k780.com:88/?app=ip.get&ip=".$arr['uip']."&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json";
        $str = file_get_contents($curl);

        $data =json_decode($str,true);
        $value = $data['result']['area_style_areanm'];
        $a =  substr($value,strpos($value,',')+1);
        $arr['ip']=$a;

        //  print_r($arr);die;
        return view('index.my.center',$arr);
    }
}
