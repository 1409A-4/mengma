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
    function invite_Check(Request $request){
        $data = $request->except('_token');
        $email = trim($data['email_start']).trim($data['email_end']);
        $name = session('name');
        $user = new User();
        $arr = $user->where('u_name',$name)->first()->toArray();

        $name = $arr['u_name'];
        $id = $arr['u_id'];

        $content = '您好,猛犸旅途网欢迎您,您的好友'. $name .'邀请您注册猛犸旅途，
    <a href="http://'. $_SERVER['HTTP_HOST'].'/login/register?id='. $id .'" >点击</a>
    ，立即注册';

       Mail::raw($content, function ($m) use($email) {
            $m->to($email)->subject('欢迎加入猛犸旅途');
        });

        echo "<script>alert('邀请成功');location.href=document.referrer</script>";

    }
    /*
     *  修改密码
     * 
     * */
    
    public function resetPass(){
        return view("index.my.resetPass");
    }
    
    /*
     * 处理修改密码 
     **/
    public function pass_Check(Request $request){
        $data = $request->except('_token');
        $user = new User();
        $name = session('name');
        $newpwd = md5($data['oldpassword']);
        $arr = $user->where('u_name',$name)->first()->toArray();
        if($arr['u_pwd']==$newpwd){
            $res = $user->update(['pwd'=>$newpwd])->where('u_name',$name);
            if($res){
                echo "<script>alert('修改密码成功');location.href=document.referrer</script>";
            }else{
                echo "<script>alert('修改密码失败');location.href=document.referrer</script>";
            }
        }else{
            echo "<script>alert('修改密码失败');location.href=document.referrer</script>";
        }


    }
}



