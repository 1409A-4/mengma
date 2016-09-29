<?php

namespace App\Http\Controllers\Index;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Index\Hotel;
use Mail;
use App\Model\Index\Hotelorder;
use App\Model\Index\User;

class PaymentController extends Controller
{
    /*
     *  酒店支付信息管理
     */
    public function hpayment(Request $request){
        $data = $request->except('_token');
        if(!empty(session('name'))){
            $name = session('name');
            $arr  = User::where('u_name',$name)->first()->toArray();
            $res  = Hotel::where('h_id',$data['id'])->first()->toArray();
            return view('index.hpayment',['data'=>$data['id'],'arr'=>$arr,'res'=>$res]);
        }else{
            $res  = Hotel::where('h_id',$data['id'])->first()->toArray();
            return view('index.hpayment',['data'=>$data['id'],'res'=>$res]);
        }
    }
    /*
     *  酒店支付管理
     */
    public function imprest(Request $request){
        $data = $request->except('_token');
        $rs = $data['contacts'];
        $hname = Hotel::where('h_id',$data['id'])->first()->toArray();
        $b_time = strtotime($data['b_time']);
        $begin=0;
        $end = 10000;
        $limit = 2;
        $rand_array=range($begin,$end);
        shuffle($rand_array);//调用现成的数组随机排列函数
        $res = array_slice($rand_array,0,$limit);//截取前$limit个
        $order_number = $b_time+$res[0]-$res[1];
        $order = "mm$order_number$res[0]";
        $now = date('Y-m-d H:i:s');
        $sql = Hotelorder::insert(
            [
                'u_id'=>$data['contacts'],
                'o_price'=>$data['gprice'],
                'o_num' => $data['h_nums'],
                'h_id' =>$data['id'],
                'ht_id' => $data['ht_id'],
                'o_intime'=>$data['b_time'],
                'o_outtime'=>$data['e_time'],
                'o_number' => $order,
                'o_addtime' => $now
            ]
        );
        if($sql){
            return view('index.cashier',['hname'=>$hname,'data'=>$data,'order'=>$order]);
        }else{
            return back();
        }
    }
    /*
     *  酒店支付
     */
    public function paying(Request $request){
        $data = $request->except('_token');
        $request_url =implode('/',explode('/',$_SERVER['REQUEST_URI'],-1));//得到当前的路径的根目录
        $this_ip = 'http://'.$_SERVER['HTTP_HOST'].$request_url;//获取当前地址
        // ******************************************************配置 start*************************************************************************************************************************
        //↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        //合作身份者id，以2088开头的16位纯数字
        $alipay_config['partner']		= '2088002075883504';
        //收款支付宝账号
        $alipay_config['seller_email']	= 'li1209@126.com';
        //安全检验码，以数字和字母组成的32位字符
        $alipay_config['key']			= 'y8z1t3vey08bgkzlw78u9cbc4pizy2sj';
        //↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        //签名方式 不需修改
        $alipay_config['sign_type']    = strtoupper('MD5');
        //字符编码格式 目前支持 gbk 或 utf-8
        //$alipay_config['input_charset']= strtolower('utf-8');
        //ca证书路径地址，用于curl中ssl校验
        //请保证cacert.pem文件在当前文件夹目录中
        $alipay_config['cacert']    = getcwd().'\\cacert.pem';
        //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
        $alipay_config['transport']    = 'http';
        // ******************************************************配置 end*************************************************************************************************************************
        // ******************************************************请求参数拼接 start*************************************************************************************************************************
        $parameter = array(
            "service" => "create_direct_pay_by_user",
            "partner" => $alipay_config['partner'], // 合作身份者id
            "seller_email" => $alipay_config['seller_email'], // 收款支付宝账号
            "payment_type"	=> '1', // 支付类型
            "notify_url"	=> "$this_ip/fail", // 服务器异步通知页面路径
            "return_url"	=> "$this_ip/mail", // 页面跳转同步通知页面路径
            "out_trade_no"	=> $data['order'], // 商户网站订单系统中唯一订单号
            "subject"	=> $data['name'], // 订单名称
            "total_fee"	=> "0.01", // 付款金额
            "body"	=> "", // 订单描述 可选
            "show_url"	=> "", // 商品展示地址 可选
            "anti_phishing_key"	=> "", // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
            "exter_invoke_ip"	=> "", // 客户端的IP地址
            "_input_charset"	=> 'utf-8', // 字符编码格式l
        );
        // 去除值为空的参数
        foreach ($parameter as $k => $v) {
            if (empty($v)) {
                unset($parameter[$k]);
            }
        }
        // 参数排序
        ksort($parameter);
        reset($parameter);
        // 拼接获得sign
        $str = "";
        foreach ($parameter as $k => $v) {
            if (empty($str)) {
                $str .= $k . "=" . $v;
            } else {
                $str .= "&" . $k . "=" . $v;
            }
        }
        $parameter['sign'] = md5($str . $alipay_config['key']);
        $parameter['sign_type'] = $alipay_config['sign_type'];
        // ******************************************************请求参数拼接 end*************************************************************************************************************************
        // ******************************************************模拟请求 start*************************************************************************************************************************
        $sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='https://mapi.alipay.com/gateway.do?_input_charset=utf-8' method='get'>";
        foreach ($parameter as $k => $v) {
            $sHtml.= "<input type='hidden' name='" . $k . "' value='" . $v . "'/>";
        }
        $sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";
        // ******************************************************模拟请求 end*************************************************************************************************************************
        echo $sHtml;
    }
    /*
     *  酒店支付成功  发送邮箱  跳转到成功页面
     */
    public function mail(Request $request){
        $data = $request->except('_token');
        $arr = Hotelorder::where('o_number',$data['out_trade_no'])->first()->toArray();
        $price = $arr['o_price'];
        $mail = User::where('u_id',$arr['u_id'])->first()->toArray();
        $email = $mail['u_email'];
        Mail::raw("预定成功,您预定".$arr['o_num']."个房间，订单号：".$data['out_trade_no']."预交资金".$arr['o_price']."元",function ($m) use ($email){
            $m->to($email)->subject("酒店订购");
        });
        $looks = Hotel::where('h_id',$arr['h_id'])->first()->toArray();
        $num = $looks['h_nums']-$arr['o_num'];
        $up = Hotel::where('h_id',$arr['h_id'])->update(['h_nums'=>$num]);
        $up = Hotelorder::where('o_number',$data['out_trade_no'])->update(['o_status'=>'1']);
        if($arr){
            if($up){
                return view('index.mail',['price'=>$price]);
            }else{
                return back()->withInput();
            }
        }else{
            return back()->withInput();
        }
    }
    /*
     *  酒店预支付
     */
//    public function imprest2(Request $request){
//        $data = $request->except('_token');
//        $res = $data['contacts'];
//        $rs = User::where('u_id',$res)->first()->toArray();
//        $email = $rs['u_email'];
//        Mail::raw("预定成功,您预定".$data['h_nums']."个房间，预交资金".$data['gprice']."元",function ($m) use ($email){
//            $m->to($email)->subject("酒店订购");
//        });
//        $arr = Hotelorder::insert(
//            [
//                'u_id'=>$data['contacts'],
//                'o_price'=>$data['gprice'],
//                'o_num' => $data['hnums'],
//                'h_id' =>$data['id'],
//                'ht_id' => $data['ht_id'],
//                'o_intime'=>$data['b_time'],
//                'o_outtime'=>$data['e_time']
//            ]
//        );
//        $looks = Hotel::where('h_id',$data['id'])->first()->toArray();
//        $num = $looks['h_nums']-$data['h_nums'];
//        $up = Hotel::where('h_id',$data['id'])->update(['h_nums'=>$num]);
//        if($arr){
//            if($up){
//                return view('index.mail',['price'=>$data['gprice']]);
//            }else{
//                return back()->withInput();
//            }
//        }else{
//            return back()->withInput();
//        }
//    }

}
?>