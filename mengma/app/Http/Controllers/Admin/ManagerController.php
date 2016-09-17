<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ManagerController extends Controller
{
    /*
     * 加载管理员添加
     * */
    public function loadManagerAdd(){
        return view('admin/manager/add');
    }
    /*
     * 管理员添加
     * */
    public function managerAdd(Request $request){
        $data = $request->except('_token');
        $rules = [
            'uname' => 'required|between:3,10|unique:admin,uname',
            'upwd' => 'required|between:3,10',
            'urepwd' => 'required|same:upwd',
            'uemail' => 'required|email|unique:admin,uemail',
            'uimg'=>'required'
        ];
        $message = [
            'uname.required' => '账户不能为空！',
            'uname.between' => '账户长度必须在3到10位之间！',
            'uname.unique' => '账户已经被占用！',
            'upwd.required' => '密码不能为空！',
            'upwd.between' => '密码长度必须在3到10位之间！',
            'urepwd.required' => '确认密码不能为空！',
            'urepwd.same' => '密码和确认密码必须相同！',
            'uemail.required' => '邮箱不能为空！',
            'uemail.email' => '邮箱格式不正确！',
            'uemail.unique' => '邮箱已经被占用！',
            'uimg.required' => '头像不能为空！',
        ];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            unset($data['urepwd']);
            $data['uimg']=\FileUp::image($_FILES['uimg']);
            $data['upwd']=md5($data['upwd']);
            $data['ubtime']=date('Y-m-d H:i:s');
            $data['uip']=$_SERVER["REMOTE_ADDR"];
            if($bool=Admin::insert($data)){
                return redirect()->action('Admin\ManagerController@managerShow')->with(['message' => "添加成功！"]);
            }else{
                return back()->with(['message' => "系统异常，请联系管理员！"]);
            }
        } else {
            return back()->withErrors($validator);
        }
    }
    /*
    * 管理员管理
    * */
    public function managerShow(){
        $data=Admin::get();
        return view('admin/manager/show',['data'=>$data]);
    }
    /*
     * 加载管理员编辑
     * */
    public function loadManagerEdit(Request $request){
        return view('admin/manager/edit',['data'=>Admin::where('uid', $request->input('uid'))->first()]);
    }
    /*
    * 管理员编辑
    * */
    public function managerEdit(Request $request){
        $data = $request->except('_token');
        $uid=$data['uid'];
        $rules = [
            'uname' => "required|between:3,10|unique:admin,uname,$uid,uid",
            'uemail' => "required|email|unique:admin,uemail,$uid,uid",
        ];
        $message = [
            'uname.required' => '账户不能为空！',
            'uname.between' => '账户长度必须在3到10位之间！',
            'uname.unique' => '账户已经被占用！',
            'uemail.required' => '邮箱不能为空！',
            'uemail.email' => '邮箱格式不正确！',
            'uemail.unique' => '邮箱已经被占用！'
        ];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            if ($request->hasFile('uimg')) {
                $data['uimg']=\FileUp::image($_FILES['uimg']);
            }
            $data['uetime']=date('Y-m-d H:i:s');
            $data['uip']=$_SERVER["REMOTE_ADDR"];
            if(Admin::where('uid',$uid)->update($data)!==false){
                return redirect()->action('Admin\ManagerController@ManagerShow')->with(['message' => "修改成功！"]);
            }else{
                return back()->with(['message' => "系统异常，请联系管理员！"]);
            }
        } else {
            return back()->withErrors($validator);
        }
    }
    /*
     * 管理员删除
     * */
    public function managerDel(Request $request){
        if(Admin::where('uid',$request->input('uid'))->delete()){
            echo json_encode(1);
        }else{
            echo json_encode(0);
        }
    }
}
