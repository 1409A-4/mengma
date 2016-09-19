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
use toArray;
use App\libs\Open51094;
use App\Model\Index\User;

class LoginController extends Controller{

    /*
     * 登陆页面
     **/
    public function index(){
       
        $name = session('name');
        if(isset($name)){
            return redirect::to('/');
        }
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
            'valid_code' => "required",
            'mail_valid_code' => "required",
            'mail_input' => "required | unique:user,u_email",

        ];
        $message = [
            'mail_input.required' => '邮箱地址不能为空！',
            'mail_input.unique' => '邮箱地址已存在！',
            'valid_code.required' => '图片验证码不能为空！',
            'mail_valid_code.required' => '邮箱验证码不能为空！',
            'username.required' => '账户不能为空！',
            'username.unique' => '账户已存在！',
            'password.required' => '密码不能为空！',
        ];
        $validator = Validator::make($data, $rules, $message);
        if($validator->passes()){

            //判断邮箱验证码
            $rand = $request->session()->get('rand');

           if($rand==$data['mail_valid_code']){
              //判断验证码是否一致
              $verify = new \Verify();
              if ($verify->check($_POST['valid_code'])) {
                        $arr['u_name']=$data['username'];
                        $arr['u_pwd']=md5($data['password']);
                        $arr['u_email']=$data['mail_input'];
                        $arr['u_btime']=date('Y-m-d H:i:s');
                        $arr['u_ip']=$_SERVER['REMOTE_ADDR'];
                        $arr['u_img']="./image/tx_img.gif";

                    $user = new User();
                    $res =  $user->insert($arr);
                    if($res){
                        echo "<script>alert('注册成功');location.href='login/login'</script>";

                    }else{
                       echo "window.location.href = document.referrer";
                    }

              } else {
                  return back()->with(['message' => "验证码错误！"]);
              }
            }else{
              return back()->with(['message' => "邮箱验证码错误！"]);
            }
        }else{
            return back()->withErrors($validator);
        }

    }
    /*
     *  忘记密码
     * */
    public function forget_Pass(){
      
        return view('login.forget');
    }
    /*
     *  处理忘记密码
     */
    public function forget_Check(Request $request){
       $data = $request->except('_token');

        $rules = [

            'valid_code' => "required",
            'mail_valid_code' => "required",
            'mail_input' => "required ",

        ];

        $message = [
            'mail_input.required' => '邮箱地址不能为空！',
           // 'mail_input.unique' => '邮箱地址已存在！',
            'valid_code.required' => '图片验证码不能为空！',
            'mail_valid_code.required' => '邮箱验证码不能为空！',
        ];
        $validator = Validator::make($data, $rules, $message);
        if($validator->passes()) {
            echo 1;
            $rand = $request->session()->get('rand');

            if ($rand == $data['mail_valid_code']) {
             
                //判断验证码是否一致
                $verify = new \Verify();
                if ($verify->check($_POST['valid_code'])) {
                    $email = $data['mail_input'];
                    return view('login/reset',compact('email'));
                } else {
                    return back()->with(['message' => "验证码错误！"]);
                }
            } else {
                return back()->with(['message' => "邮箱验证码错误！"]);
            }

        }else{
            return back()->withErrors($validator);
        }
    }

    /*
     * 重置密码
     *
     */
    public function reset_Pass(Request $request){

        $data = $request->except('_token');
        $rules = [
            'password' => "required",
            're_password' => "required",
        ];

        $message = [
            'password.required' => '密码不能为空！',
            're_password.required' => '确认密码不能为空！',

        ];
        $validator = Validator::make($data, $rules, $message);
        if($validator->passes()){
            if($data['password'] == $data['re_password']){
                $user = new User();
                $pwd = md5($data['password']);
                $res = $user->where('u_email',$data['email'])
                             ->update(['u_pwd'=>$pwd]);
                if($res){
                    echo "<script>alert('密码重置成功');location.href='login/login'</script>";
                }
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
           /* 'uverify' => "required",*/
        ];
        $message = [
            'username.required' => '账户不能为空！',
            'password.required' => '密码不能为空！',
       /*     'uverify.required' => '验证码不能为空！'*/
        ];
        $validator = Validator::make($data, $rules, $message);
        
        if ($validator->passes()) {
            if(preg_match("/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|18[0-9]{9}$/",$data['username'])){
                //验证通过
                $arr['u_phone']=$data['username'];
                $arr['u_pwd'] = md5($data['password']);
            }else{
                //手机号码格式不对
                $arr['u_email']=$data['username'];
                $arr['u_pwd'] = md5($data['password']);

            }
            $bool=User::where($arr)->first();

                if($bool) {
                    session(['name' => $bool['u_name']]);
                    return redirect::to('login/jump');
                }else{
                    return back()->with(['message'=>"账户或密码错误"]);
                }
           /* } else {
                return back()->with(['message' => "验证码错误！"]);
            }*/
        } else {
            return back()->withErrors($validator);
        }
    }
    /*
     * 第三方登录
     * */

    public function third_Login(Request $request){
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
            return redirect::to('login/jump');
        }else{
            //$res =  DB::table('third')->insert($data);
            $res =  DB::table('user')->insert($data);
            if($res){
                session(['id'=>$res->id,'name'=>$res->uname] ,time()+900);
                return redirect::to('login/jump');
            }else{
                echo "window.location.href = document.referrer";
            }
        }
    }

    /** 退出登录 **/
    public function loginout(Request $request){

        $request->session()->flush();
        return redirect('login/jump')->with(['messages'=>'退出成功!']);
      
    }
    /*
     * 自动跳转页面
     * */
    public function jump(){
       
        return view('login.jump',compact('url'));

    }
    
    /*
     *  微信登录
     * 
     */
    public function weixin(Request $request){
       $appid = $request->get('user');
        $re = DB::table('user')->where('u_uniq',$appid)->first();
       // var_dump($appid);
        if($re){
            session(['name' => $re['u_name']]);
            return redirect::to('login/jump');
        }
      return view('login.reweixin',compact('appid'));
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
                $arr['u_name'] = $data['username'];
                $arr['u_pwd'] = md5($data['password']);

                $arr['u_phone'] = $data['phone_number'];
                $arr['created_at'] = date('Y-m-d H:i:s');
                $arr['u_ip'] = $_SERVER['REMOTE_ADDR'];
                $arr['u_img'] = "./image/tx_img.gif";
                $arr['u_uniq']= $data['appid'];
                $arr['from']='weixin';
                 //print_r($arr);die;
                $res = DB::table('user')->insert($arr);
                if ($res) {
                    session(['name' => $res['u_name']]);
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
