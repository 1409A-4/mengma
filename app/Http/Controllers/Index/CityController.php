<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Model\Index\Group;
use Illuminate\Http\Request;

use App\Model\Index\Package;
use App\Model\Index\Package_type;
use App\Model\Index\Region;
use App\Model\Index\Project;
use App\Model\Index\Project_type;

class CityController extends Controller{

    /*
     * 首页
     *
     */
    public function index(Request $request)
    {
            $where = $request->all();
      if($where){

          $arr = Project::where($where)->get()->toArray();
      }else{
             $arr = Project::get()->toArray(); 
      }
        $reg = $where['reg_id'] ? $where['reg_id']: 0;
        $g = $where['g_id'] ? $where['g_id']: 0;
        
        $request->session()->flash('reg', $reg);
        $request->session()->flash('g', $g);

        $data['country'] = Region::where('parent_id',0)->get()->toArray();
        $type = Group::get()->toArray();
       

        return view('index.play.index',['data'=>$data,'type'=>$type,'arr'=>$arr]);
    }

    public function search(Request $request){
        $pid = $request->all();

        $where =$pid;

        $arr = Project::where($where)->get()->toArray();

        print_r($arr);
    }

    /*
     * 城市详情
     */
    public function infor(Request $request){
        $p_id = $request->input();

        $data = Project::where($p_id)->first()->toArray();

        $type = Project_type::select('prt_name','prt_price','prt_id')->where($p_id)->get()->toArray();
        return view('index.play.place_info',['data'=>$data,'type'=>$type]);
    }

    /*
     * 城市预订
     */
    public function package(Request $request ){
        $data = $request->except('_token');
        //print_r($data);die;
        $info = Project::where('pro_id',$data['p_id'])->first()->toArray();
        $type = Project_type::where('pro_id',$data['p_id'])->where('prt_id',$data['p_type'])->first()->toArray();
        $data['p_name'] = $info['pro_name'];
        $data['p_abstract'] = $info['pro_name'];
        $data['pt_name'] = $type['prt_name'];
        $data['pt_price'] = $type['prt_price'];
        print_r( $data);die;
        return view('index.projectOrder',['data'=>$data]);

    }
}