<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\Index\Hotel;
use App\Model\Index\Hotelorder;
use App\Model\Index\Hoteltype;
use App\Model\Index\User;
use App\Model\Index\Hotelimg;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Request;

class AlreadyController extends Controller
{
    /*
     *  用户已下订单
     */
    public function hauorders(){
        $id = session('uid');
        $order = Hotelorder::where('u_id',$id)->get()->toArray();
        foreach($order as $key => $v){
            $order[$key]['name'] = Hotel::where('h_id',$v['h_id'])->get()->toArray()[0]['h_name'];
        }
        foreach($order as $key => $v){
            $order[$key]['type'] =Hoteltype::where('ht_id',$v['ht_id'])->get()->toArray()[0]['ht_name'];
        }
        $user = User::where('u_id',$id)->first()->toArray();
        return view('index.hauorders',['order'=>$order,'user'=>$user]);
    }

    /*
     *  用户订单详情
     */
    public function horderds(Request $request){
        $data = $request->except('_token');
        $order = Hotelorder::where('ho_id',$data['id'])->first()->toArray();
        $order['name'] = Hotel::where('h_id',$order['h_id'])->first()->toArray()['h_name'];
        $order['type'] =Hoteltype::where('ht_id',$order['ht_id'])->first()->toArray()['ht_name'];
        $img = "assets/img/hotels/1.jpg";
        $res = Hotelimg::where('h_id',$order['h_id'])->first();
            if($res==""){
                $order['img']=$img;
            }else{
                $order['img']=$res->toArray()['h_img'];
            }
        $user = User::where('u_id',$order['u_id'])->first()->toArray();
        return view('index.horderds',['order'=>$order,'user'=>$user]);
    }

    /*
     *  删除订单
     */
    public function delorder(Request $request){
        $data = $request->except('_token');
        $del = Hotelorder::where('o_number',$data['number'])->delete();
        if($del){
            return Redirect::to('hauorders');
        }else{
            return 0;
        }
    }
}