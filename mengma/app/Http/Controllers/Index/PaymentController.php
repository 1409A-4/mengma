<?php

namespace App\Http\Controllers\Index;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Front\Hotel;
use Mail;
use App\Model\Front\Goodslist;
use App\Model\Front\User;

class PaymentController extends Controller
{
    /*
     *  酒店支付信息管理
     */
    public function hpayment(Request $request){
        $data = $request->except('_token');
        $arr  = User::get()->toArray();
        $res  = Hotel::where('h_id',$data['id'])->first()->toArray();
        return view('index.hpayment',['data'=>$data['id'],'arr'=>$arr,'res'=>$res]);
    }
    /*
     *  酒店预支付
     */
    public function imprest(Request $request){
        $data = $request->except('_token');
        $res = $data['contacts'];
        $rs = User::where('uid',$res)->first()->toArray();
        $email = $rs['uemail'];
        Mail::raw("预定成功,您预定".$data['h_nums']."个房间，预交资金".$data['gprice']."元",function ($m) use ($email){
            $m->to($email)->subject("酒店订购");
        });
        $ltime = date("Y-m-d H:i:s");
        $arr = Goodslist::insert(
            [
                'bid'=>'0',
                'uid'=>$data['contacts'],
                'gprice'=>$data['gprice'],
                'gid' =>$data['id'],
                'lbtime'=>$ltime
            ]
        );
        if($arr){
            return view('index.mail');
        }else{
            return back()->withInput();
        }
    }

}
?>