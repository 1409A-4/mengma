<?php
namespace App\Http\Controllers\Index;
use  Illuminate\Routing\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use session;
use input;
use Validator;
use Redirect;
use Mail;

use App\libs\Open51094;
use App\Model\Index\User;

class LoginController extends Controller{

    /*
     * 登陆页面
     **/
    public function index(){

        return view('login.index');
    }

    /*
     * 验证码
     *
     **/
    public function Verify(Request $request)
    {
        $verify = new \Verify();
        $verify->codeSet = '012356789';
        $verify->useImgBg = true;
        $verify->entry();
    }

    /*
 *  注册页面
 */
    public function register(){

        return view('login.register');
    }

    /*
     * 注册验证
     */
    public function registration (Request $request){
        $data = $request->except('_token');
        $rules = [
            'username' => 'required |unique:user,u_name',
            'password' => 'required',
            'confirm_password' => "required",
            'phone_number' => "required | unique:user,u_phone",
            'email' => "required | unique:user,u_email",

        ];
        $message = [
            'username.required' => '账户不能为空！',
            'username.unique' => '账户已存在！',
            'password.required' => '密码不能为空！',
            'confirm_password.required' => '确认密码不能为空！',
            'confirm_password.confirmed' => '确认密码不一致！',
            'phone_number.required' => '手机号码不能为空！',
            'phone_number.unique' => '手机号码已存在！',
            'email.required' => '邮箱地址不能为空！',
            'email.unique' => '邮箱地址已存在！',
        ];
        $validator = Validator::make($data, $rules, $message);
        if($validator->passes()){
            //print_r($data);
            $rand = $request->session()->get('rand');
            //判断验证码
          if($rand==$data['code']){
              //判断密码是否一致
                if($data['password']==$data['confirm_password']){
                        $arr['u_name']=$data['username'];
                        $arr['u_pwd']=md5($data['password']);
                        $arr['u_email']=$data['email'];
                        $arr['u_phone']=$data['phone_number'];
                        $arr['u_btime']=date('Y-m-d H:i:s');
                        $arr['u_ip']=$_SERVER['REMOTE_ADDR'];
                        $arr['u_img']="./image/tx_img.gif";
                   // print_r($arr);die;
                    $user = new User();
                   $res =  $user->insert($arr);
                    if($res){
                        return redirect::to('index/login');
                    }else{
                       echo "window.location.href = document.referrer";
                    }

                }else{
                    return back()->with(['message' => "两次输入密码不一致！"]);
                }
          }else{
              return back()->with(['message' => "邮箱验证码错误！"]);
          }
        }else{
            return back()->withErrors($validator);
        }

    }
    /*
     *  注册发送邮箱验证码
     *
     * */
    public function send(Request $request){
       $email = $request->get('email');
        $rand = rand(10000,99999);
        session(['rand'=>$rand],time()+300);
        Mail::raw('您好，猛犸旅途网欢迎您，您的注册邮箱为：'.$email.',您的邮箱验证码为：'.$rand, function ($m) use($email) {
            $m->to($email)->subject('欢迎加入猛犸旅途，请验证注册邮箱');
        });

    }

    //登录验证

    public function loginin(Request  $request){

        $data = $request->except('_token');
        $rules = [
            'username' => 'required',
            'password' => 'required',
            'uverify' => "required",
        ];
        $message = [
            'username.required' => '账户不能为空！',
            'password.required' => '密码不能为空！',
            'uverify.required' => '验证码不能为空！'
        ];
        $validator = Validator::make($data, $rules, $message);

        if ($validator->passes()) {
            $verify = new \Verify();
            $user = new User();
            if ($verify->check($_POST['uverify'])) {
                unset($data['uverify']);
                $arr['u_name']=$data['username'];
                $arr['u_pwd'] = md5($data['password']);

                $bool=$user->where($arr)->first()->toArray();
                session(['name'=>$bool['u_name']]);
                return redirect::to('/');
            } else {
                return back()->with(['message' => "验证码错误！"]);
            }
        } else {
            return back()->withErrors($validator);
        }
    }
    /*
     * 第三方登录
     * */

    public function thirdlogin(Request $request){
        $code = $request->get('code');
        $open = new open51094();
        $arr = $open->me($code);

        $data['u_name']=$arr['name'];
        $data['u_img']=$arr['img'];
        $data['u_uniq']=$arr['uniq'];
        $data['from']=$arr['from'];
        $data['u_btime']=date('Y-m-d');
        $data['u_ip']=$_SERVER['REMOTE_ADDR'];

        //判断用户是否登录过
        $user = new User();
        $re = $user->where('u_uniq',$data['u_uniq'])->first();

        if($re){
           session(['uid'=>$re->id,'name'=>$re->u_name], time()+900);
            return redirect::to('/');
        }else{
            //$res =  DB::table('third')->insert($data);
            $res =  DB::table('user')->insert($data);
            if($res){
                session(['id'=>$res->id,'name'=>$res->uname] ,time()+900);
                return redirect::to('/');
            }else{
                echo "window.location.href = document.referrer";
            }
        }
    }

    /** 退出登录 **/
    public function loginout(Request $request){

        $request->session()->flush();
        return redirect::to('/');
    }
    
    /*
     *  微信登录
     * 
     */
    public function weixin(Request $request){
       $appid = $request->get('user');
        $re = DB::table('user')->where('uniq',$appid)->first();
       // var_dump($appid);
        if($re){
            \Request::session()->put('name',$re['uname']);
            return redirect::to('index/login');
        }
      return view('index.login.reweixin',compact('appid'));
    }
    
    /*
     *  微信 注册
     * 
     * */
    public function RegisWeixin(Request $request)
    {
        $data = $request->except('_token');
        $rules = [
            'username' => 'required |unique:user,uname',
            'password' => 'required',
            'confirm_password' => "required",
            'phone_number' => "required | unique:user,uphone",

        ];
        $message = [
            'username.required' => '账户不能为空！',
            'username.unique' => '账户已存在！',
            'password.required' => '密码不能为空！',
            'confirm_password.required' => '确认密码不能为空！',
            'confirm_password.confirmed' => '确认密码不一致！',
            'phone_number.required' => '手机号码不能为空！',
            'phone_number.unique' => '手机号码已存在！',

        ];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            //print_r($data);die;

            //判断密码是否一致
            if ($data['password'] == $data['confirm_password']) {
                $arr['uname'] = $data['username'];
                $arr['upwd'] = md5($data['password']);

                $arr['uphone'] = $data['phone_number'];
                $arr['created_at'] = date('Y-m-d H:i:s');
                $arr['uip'] = $_SERVER['REMOTE_ADDR'];
                $arr['uimg'] = "./image/tx_img.gif";
                $arr['uniq']= $data['appid'];
                $arr['from']='weixin';
                 //print_r($arr);die;
                $res = DB::table('user')->insert($arr);
                if ($res) {
                    \Request::session()->put('name',$res['uname']);
                    return redirect::to('index/login');
                } else {
                    echo "window.location.href = document.referrer";
                }

            } else {
                return back()->with(['message' => "两次输入密码不一致！"]);

            }
        }else{

            return back()->withErrors($validator);
        }
    }



}
