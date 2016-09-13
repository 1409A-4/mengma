<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Admin;
use App\Model\Admin\Admin_Role;
use App\Model\Admin\Power;
use App\Model\Admin\Role_Power;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LoginCoontroller extends Controller
{
    /*
     * 加载登录
     * */
    public function loadLogin()
    {
        if(session('uid')){
            redirect('admin/index');
        }
        return view('admin/login/login');

    }

    /*
     * 登录验证
     * */
    public function checkLogin(Request $request)
    {
        $data = $request->except('_token');
        $rules = [
            'uname' => 'required',
            'upwd' => 'required',
            'uverify' => "required",
        ];
        $message = [
            'uname.required' => '账户不能为空！',
            'upwd.required' => '密码不能为空！',
            'uverify.required' => '验证码不能为空！'
        ];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            $verify = new \Verify();
            if ($verify->check($_POST['uverify'])) {
                unset($data['uverify']);
                $data['upwd'] = md5($data['upwd']);
                if( $bool=Admin::where($data)->first()){
                    $routename=DB::table('admin')
                        ->where('admin.uid',$bool->uid)
                        ->leftJoin('admin_role', 'admin.uid', '=', 'admin_role.uid')
                        ->leftJoin('role_power', 'admin_role.rid', '=', 'role_power.rid')
                        ->leftJoin('power', 'role_power.pid', '=', 'power.pid')
                        ->distinct()
                        ->select('routename')
                        ->get();
                    foreach($routename as $k=>$v){
                        $route[]=$v->routename;
                    }
                    session(['uid'=>$bool->uid,'uname'=>$bool->uname,'routename'=>$route]);
                    Admin::where('uid',$bool->uid)->update(['uetime'=>date('Y-m-d H:i:s')]);
                    return redirect()->action('Admin\IndexController@index');
                }else{
                    return back()->with(['message' => "账户或密码错误！"]);
                }
            } else {
                return back()->with(['message' => "验证码错误！"]);
            }
        } else {
            return back()->withErrors($validator);
        }
    }
    /*
     * 验证码
     * */
    public function verify(Request $request)
    {
        $verify = new \Verify();
        $verify->codeSet = '012356789';
        $verify->fontttf  = '5.ttf';
        $verify->entry();
        die;
    }
    /*
     * 退出登录
     * */
    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->action('Admin\LoginCoontroller@loadLogin')->with(['message'=>'退出成功!']);
    }
    /*
     * 修改密码
     * */
    public function setPwd(Request $request){
        $data = $request->except('_token');
        $rules = [
            'upwd' => 'required',
            'urepwd' => 'required|between:3,10',
            'urerepwd' => "required|same:urepwd",
        ];
        $message = [
            'upwd.required' => '原密码不能为空！',
            'urepwd.required' => '新密码不能为空！',
            'urepwd.between' => '密码长度必须在3到10位之间！',
            'urerepwd.required' => '确认密码不能为空！',
            'urerepwd.same' => '新密码与确认密码必须相同！'
        ];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            if(Admin::where(['uid'=>session('uid'),'upwd'=>md5($data['upwd'])])->first()){
                if($data['urepwd']==$data['upwd']){
                    return back()->with(['message'=>'修改成功！']);
                }
                if(Admin::where(['uid'=>session('uid')])->update(['upwd'=>md5($data['urepwd'])])){
                    return back()->with(['message'=>'修改成功！']);
                }else{
                    return back()->with(['message'=>'系统异常请联系管理员！']);
                }
            }else{
                return back()->with(['message'=>'原密码错误！']);
            }
        } else {
            return back()->withErrors($validator);
        }
    }
}
//                    $one=Admin_Role::where('uid',$bool->uid)->get();
//                    foreach($one as $k=>$v){
//                        $rid[]=$v->rid;
//                    }
//                    $two=Role_Power::whereIn('rid',$rid)->select('pid')->distinct()->get();
//                    foreach($two as $k=>$v){
//                        $pid[]=$v->pid;
//                    }
//                    $three=Power::whereIn('pid',$pid)->select('routename')->get();
//                    foreach($three as $k=>$v){
//                        $routename[]=$v->routename;
//                    }
