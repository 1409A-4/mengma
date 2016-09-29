<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Power;
use App\Model\Admin\Role;
use App\Model\Admin\Role_Power;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.power.show',['data'=>Power::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.power.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except('_token');
        $rules = [
            'pname' => "required|unique:power,pname",
            'routename'=>"required|unique:power,routename",
        ];
        $message = [
            'pname.required' => '权限不能为空！',
            'rname.unique' => '权限已经被占用！',
            'routename.required' => '路由不能为空！',
            'routename.unique' => '路由已经被占用！',
        ];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            $data['pbtime']=date('Y-m-d H:i:s');
            if (Power::insert($data)) {
                return redirect('admin/power')->with(['message' => "添加成功！"]);
            }
            return back()->with(['message' => "系统异常，请联系管理员！"]);
        } else {
            return back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.power.edit',['data'=>Power::where('pid',$id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->except('_token','_method');
        $rules = [
            'pname' => "required|unique:power,pname,$id,pid",
            'routename'=>"required|unique:power,routename,$id,pid",
        ];
        $message = [
            'pname.required' => '权限不能为空！',
            'rname.unique' => '权限已经被占用！',
            'routename.required' => '路由不能为空！',
            'routename.unique' => '路由已经被占用！',
        ];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            if (Power::where('pid',$id)->update($data)!==false) {
                return redirect('admin/power')->with(['message' => "修改成功！"]);
            }
            return back()->with(['message' => "系统异常，请联系管理员！"]);
        } else {
            return back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            Power::where('pid',$id)->delete();
            Role_Power::where('pid',$id)->delete();
            DB::commit();
            echo json_encode(1);
        }catch(\PDOException $e){
            DB::rollBack();
            echo json_encode(0);
        }
    }
    /*
     * 加载分配权限
     * */
    public function loadPowerAssign()
    {
        return view('admin.power.powerassign',['role'=>Role::get(),'power'=>Power::get()]);
    }
    /*
     * 分配权限
     * */
    public function powerAssign(Request $request)
    {
        $data=$request->except('_token');
        $rules = [
            'rid' => "numeric",
            'pid'=>"required",
        ];
        $message = [
            'rid.numeric' => '请选择角色！',
            'pid.required' => '请选择权限！'
        ];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            if(Role_Power::where('rid',$data['rid'])->get()->toArray()){
                Role_Power::where('rid',$data['rid'])->delete();
            }
            foreach($data['pid'] as $k=>$v){
                $arr[$k]['pid']=$v;
                $arr[$k]['rid']=$data['rid'];
            }
            if (Role_Power::insert($arr)) {
                return redirect('admin/loadPowerAssign')->with(['message' => "分配成功！"]);
            }
            return back()->with(['message' => "系统异常，请联系管理员！"]);
        } else {
            return back()->withErrors($validator);
        }
    }
    /*
     * 查找当前角色所拥有权限
     * */
    public function rolePower(Request $request)
    {
        if ($data = Role_Power::where('rid', $request->input('rid'))->get()->toArray()) {
            foreach($data as $k=>$v){
                $arr[]=$v['pid'];
            }
            echo json_encode($arr);
        } else {
            echo json_encode(0);
        }
    }
}
