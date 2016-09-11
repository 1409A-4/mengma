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
use App\Model\Index\User;

class MyController  extends Controller{

    /*
    * 用户中心
    * 
    * */

    public function Index(){
        $name =session('name');
        $user = new User();
        $arr = $user->where('u_name',$name)->first()->toArray();

        $curl = "http://api.k780.com:88/?app=ip.get&ip=".$arr['u_ip']."&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json";
        $str = file_get_contents($curl);

        $data =json_decode($str,true);
        $value = $data['result']['area_style_areanm'];
     
        $a =  substr($value,strpos($value,',')+1);
        $arr['ip']=$a;
      
        return view('index.my.personal',$arr);
    }

    /*
     *  邀请注册
     *
     * */
    public function Invite(){

        return view('index.my.invite');
       
    }
    /*
     * 处理邀请
     * */
    /*function invite_Check(Request $request){
        $data = $request->except('_token');
      $email = trim($data['email_start']).trim($data['email_end']);
        $name = session('name');
        $user = new User();
        $arr = $user->where('u_name',$name)->first()->toArray();

        Mail::raw("您好，猛犸旅途网欢迎您，您的好友".$arr['u_name']."邀请你注册", function ($m) use($email) {
            $m->to($email)->subject('欢迎加入猛犸旅途，请验证注册邮箱');
        });



        $title   = '您好，我是iwebshop商城的管理员×××';
        $content = '您的好友'. $user_name .'正在疯狂的购物，
    <a href="http://'. $_SERVER['HTTP_HOST'].'/months8/iwebshop/index.php?controller=simple&action=reg&id='. $user_id .'" >点击注册</a>
    ，立即去购物';
        //print_r($content);die;
        $smtp  = new SendMail();
        $error = $smtp->getError();

        $list = array();
        $tb   = new IModel("email_registry");

        $ids_sql = "1";
        if($ids)
        {
            $ids_sql = "id IN ({$ids})";
        }
        $to = $email;

        $bcc = array();
        foreach($list as $value)
        {
            $bcc[] = $value['email'];
        }
        $bcc = join(";",$bcc);
        $result = $smtp->send($to,$title,$content,$bcc);
        if(!$result)
        {
            die('发送失败');
        }else{
            //自定义跳转页面
            $callback = $callback ? urlencode($callback) : '';
            $this->redirect('/site/success?message='.urlencode("邀请成功！").'&callback='.$callback);
        }

    }*/
    /*
     *  修改密码
     * 
     * */
    
    public function resetPass(){
        return view("index.my.resetPass");
    }
}
