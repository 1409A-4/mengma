<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\Front\Hoteltype;
use App\model\Front\Hotel;
use App\model\Front\Goodsimg;

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
        $sql = Hotel::get()->toArray();
        foreach($sql as $key =>$v){
            $sql[$key]['img']=Goodsimg::where('gid',$v['h_id'])->first()->toArray()['gimg'];
        }
        return view('index.hotel',['res'=>$arr,'sql'=>$sql]);
    }
    /*
     *  票务
     */
    public function booking()
    {
        return view('index.booking');
    }
    /*
     *  票务列表
     */
    public function bookings_list(){
        return view('index.bookings_list');
    }
}
