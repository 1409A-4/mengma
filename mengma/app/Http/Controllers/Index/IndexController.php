<?php

namespace App\Http\Controllers\Index;

use App\Model\Admin\Goods;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Index\Package;
use App\Model\Index\Package_type;
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
        return view('index.hotel');
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
        $type = Package_type::select('ht_name','ht_price','ht_id')->where('p_id',$p_id)->get()->toArray();
        return view('index.hcinfo',['data'=>$data,'type'=>$type]);
    }
    /*
     * 预定
     */
    public function packagePro(Request $request)
    {
        $data = $request->except('_token');

        $info = Package::where('p_id',$data['p_id'])->first()->toArray();
        $type = Package_type::where('p_id',$data['p_id'])->where('ht_id',$data['p_type'])->first()->toArray();
        $data['p_name'] = $info['p_name'];
        $data['p_abstract'] = $info['p_abstract'];
        $data['ht_name'] = $type['ht_name'];
        $data['ht_price'] = $type['ht_price'];
        //return $data;
        return view('index.packageOrder',['data'=>$data]);
    }
    public function packageBuy(Request $request)
    {
        $data = $request->except('_token');
        print_r($data);
    }
}
