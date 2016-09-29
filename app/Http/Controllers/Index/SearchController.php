<?php

namespace App\Http\Controllers\Index;

use App\Model\Index\Hotelimg;
use App\Model\Index\Hoteltype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\VerifyCsrfToken;
use App\model\Index\Hotel;
use App\Model\Index\Comment;
use Illuminate\Support\Facades\Cookie;

class SearchController extends Controller
{
    /*
     *  酒店搜索
     */
     public function search_hotel(Request $request)
     {
         $data = $request->except('_token');
         if($data['rooms_type']=='0'){
             $arr = Hotel::where('h_place','like',"%".$data['province']."%")->get()->toArray();
             if($arr){
                 return $arr;
             }else{
                 return 1;
             }
         }else{
             $arr = Hotel::where('ht_id','=',$data['rooms_type'])->where('h_place','like',"%".$data['province']."%")->get()->toArray();
             if($arr){
                 return $arr;
             }else{
                 return 1;
             }
         }
     }
    /*
     *  酒店详情
     */
    public function details(Request $request)
    {
        $data = $request->except('_token');

        $arr = Hotel::where('h_id','=',$data['id'])->first()->toArray();

        $res = Hotelimg::where('h_id',$arr['h_id'])->limit(2)->get()->toArray();
        $sql=Hoteltype::where('ht_id',$arr['ht_id'])->first()->toArray();
        $arr['ht_name']=$sql['ht_name'];
        $com = Comment::join('user','user.u_id','=','comment.u_id')->where('h_id',$arr['h_id'])->get()->toArray();
        $num = count($com);
        $satisfy = Comment::join('user','user.u_id','=','comment.u_id')->where('h_id',$arr['h_id'])->where('c_status','=','1')->get()->toArray();
        $sa = count($satisfy);
        $commonly = Comment::join('user','user.u_id','=','comment.u_id')->where('h_id',$arr['h_id'])->where('c_status','=','2')->get()->toArray();
        $co = count($commonly);
        $unsatisfy = Comment::join('user','user.u_id','=','comment.u_id')->where('h_id',$arr['h_id'])->where('c_status','=','3')->get()->toArray();
        $sat = count($unsatisfy);
        $img = Comment::join('user','user.u_id','=','comment.u_id')->where('h_id',$arr['h_id'])->where('c_image','!=',' ')->get()->toArray();
        $images = count($img);
        if($arr){
            return view('index.hdetails',['arr'=>$arr,'res'=>$res,'com'=>$com,'num'=>$num,'sa'=>$sa,'co'=>$co,'sat'=>$sat,'images'=>$images,'satisfy'=>$satisfy,'commonly'=>$commonly,'unsatisfy'=>$unsatisfy,'img'=>$img]);
        }else{
            return 0;
        }
    }
    /*
     *  航班搜索
     */
//    public function search_flight(Request $request)
//    {
//        $data = $request->except('_token');
//        $f_btime_b = strtotime($data['f_btime'].'00:00:00');
//        $f_btime_e = strtotime($data['f_btime'].'23:59:59');
//        $f_etime_b = strtotime($data['f_etime'].'00:00:00');
//        $f_etime_e = strtotime($data['f_etime'].'23:59:59');
//        $f_btime = strtotime($data['f_btime']);
//        $f_etime = strtotime($data['f_etime']);
//        $front_btime = $f_etime-48*60*60;
//        if($f_btime<=$front_btime){
//            Cookie::forget('name_2');
//            if($data['Location']==""&&$data['Destination']==""){
//                    $arr = Flight::where('f_btime','>=',$f_btime_b)->where('f_btime','<',$f_btime_e)->where('f_etime','>=',$f_etime_b)->where('f_etime','<',$f_etime_e)->where('f_type','=',$data['trip'])->get()->toArray();
//                if($arr){
//                    Cookie::forget('name_1');
//                    return view('index.bookings',['arr'=>$arr]);
//                }else{
//                    return back()->withCookie(cookie('name_1', '1'));
//                }
//            }else{
//                $arr = Flight::where('f_btime','>',$f_btime)->where('f_etime','>',$f_etime)->where('f_btime','<',$f_etime)->where('f_bplace','like','%'.$data['Location'].'%')->where('f_eplace','like','%'.$data['Destination'].'%')->where('f_type','=',$data['trip'])->get()->toArray();
//                if($arr){
//                    Cookie::forget('name_1');
//                    return view('index.bookings',['arr'=>$arr]);
//                }else{
//                    return back()->withCookie(cookie('name_1', '1'));
//                }
//            }
//        }else{
//            return back()->withCookie(cookie('name_2', '2'));
//        }

 //   }
}