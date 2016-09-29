<?php

namespace App\Http\Controllers\Index;

use App\Model\Admin\Goods;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Index\Package;
use App\Model\Index\Package_type;
use App\model\Index\Hoteltype;
use App\model\Index\Hotel;
use App\model\Index\Hotelimg;
class IndexController extends Controller
{
    /*
     * 首页
     * */
    public function index()
    {

        return view('welcome');
    }
    /*
     * 景区详情
     * */
    public function scenicSpot()
    {
        return view('index.scenicSpot');
    }
    /*
        * 酒店
        * */
    public function hotel()
    {
        $arr = Hoteltype::get()->toArray();
        $sql = Hotel::where('h_status','=','1')->simplePaginate(9);
        //print_r($sql);die;
        $img = "assets/img/hotels/1.jpg";
        foreach($sql as $key =>$v){
            $res = Hotelimg::where('h_id',$v['h_id'])->first();
            if($res==""){
                $sql[$key]['img']=$img;
            }else{
                $sql[$key]['img']=$res->toArray()['h_img'];
            }
        }
        return view('index.hotel',['res'=>$arr,'sql'=>$sql]);
    }

    /*
     * 线路
     */
    public function hotelCar()
    {
        $data = Package::get()->toArray();

        return view('index.hotelcar',['data'=>$data]);
    }

    /*
    * 线路详情
    */
    public function hotelCarin(Request $request)
    {
        $p_id = $request->input('p_id');
        $data = Package::where('p_id',$p_id)->first()->toArray();
        $type = Package_type::select('pt_name','pt_price','pt_id')->where('p_id',$p_id)->get()->toArray();
        return view('index.hcinfo',['data'=>$data,'type'=>$type]);
    }
    /*
     * 预定
     */
    public function packagePro(Request $request)
    {
        $data = $request->except('_token');

        $info = Package::where('p_id',$data['p_id'])->first()->toArray();
        $type = Package_type::where('p_id',$data['p_id'])->where('pt_id',$data['p_type'])->first()->toArray();
        $data['p_name'] = $info['p_name'];
        $data['p_abstract'] = $info['p_abstract'];
        $data['pt_name'] = $type['pt_name'];
        $data['pt_price'] = $type['pt_price'];
        //return $data;
        return view('index.packageOrder',['data'=>$data]);
    }
    public function packageBuy(Request $request)
    {
        $data = $request->except('_token');

        //print_r($le);die;
        $data['gprice'] = '0.1';
        $hname['h_name'] ="猛犸自由行";
        $order = "mm".rand(0,999999999);
        return view('index.cashier',['hname'=>$hname,'data'=>$data,'order'=>$order]);
        return view('index.cashier');

    }
    
    /*
     * 判断是否登录
     */
    public function checkLogin(){
        if(!session('name')){
            echo 0;
        }else{
            echo 1;
        }
    }
}
