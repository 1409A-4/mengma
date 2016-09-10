<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Admin;
use App\Model\Admin\Admin_Role;
use App\Model\Admin\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.show', ['data' => Role::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $rules = [
            'rname' => "required|unique:role,rname",
        ];
        $message = [
            'rname.required' => '角色名称不能为空！',
            'rname.unique' => '角色名称已经被占用！',
        ];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            $data['rbtime'] = date('Y-m-d H:i:s');
            if (Role::insert($data)) {
                return redirect('admin/role')->with(['message' => "添加成功！"]);
            } else {
                return back()->with(['message' => "系统异常，请联系管理员！"]);
            }
        } else {
            return back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/role/edit', ['data' => Role::where('rid', $id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        $rules = [
            'rname' => "required|unique:role,rname,$id,rid",
        ];
        $message = [
            'rname.required' => '角色名称不能为空！',
            'rname.unique' => '角色名称已经被占用！',
        ];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            if (Role::where('rid', $id)->update($data) !== false) {
                return redirect('admin/role')->with(['message' => "修改成功！"]);
            }
            return back()->with(['message' => "系统异常，请联系管理员！"]);
        } else {
            return back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Role::where('rid', $id)->delete()) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /*
     * 加载分配角色
     * */
    public function loadRoleAssign()
    {
        return view('admin.role.roleassign', ['admin' => Admin::get(), 'role' => Role::get()]);
    }

    /*
     * 分配角色
     * */
    public function roleAssign(Request $request)
    {
        $data = $request->except('_token');
        if ($data['uid'] == "选择用户") {
            return back()->with(['message' => "请选择用户！"]);
        }
        $rules = [
            'rid' => "required",
        ];
        $message = [
            'rid.required' => '请选择角色！',
        ];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            if(Admin_Role::where('uid',$data['uid'])->get()->toArray()){
                Admin_Role::where('uid',$data['uid'])->delete();
            }
            foreach ($data['rid'] as $k => $v) {
                $arr[$k]['uid'] = $data['uid'];
                $arr[$k]['rid'] = $v;
            }
            return $arr;
            if(Admin_Role::insert($arr)){
                return back()->with(['message' => "分配成功！"]);
            }
        } else {
            return back()->withErrors($validator);
        }
    }

    /*
     * 查询当前用户角色
     * */
    public function adminRole(Request $request)
    {
        if ($data = Admin_Role::where('uid', $request->input('uid'))->get()->toArray()) {
            foreach($data as $k=>$v){
                $arr[]=$v['rid'];
            }
            echo json_encode($arr);
        } else {
            echo json_encode(0);
        }

    }
}
