<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Business\Navigation;
use App\Model\Business\Goods;
use App\Model\Business\Goodsimg;
use App\Model\Business\Hotel;
use App\Model\Business\Hotel_class;
use Illuminate\Support\Facades\Validator;
use DB;
class GoodsController extends Controller
{
    //无限级分类
    public function make($arr,$fid=0,$level=0)
    {
        //print_r($arr);die;
        static $data=array();
        foreach($arr as $k=>$v){
            if($v['pid']==$fid){
                $v['level']=$level;
                $data[]=$v;
                $this->make($arr,$v['nid'],$level+1);
            }
        }
        return $data;
    }
    /*
     * 添加分类页面
     */
    public function typeAdd()
    {
        $navigation = new Navigation();
        $re = $navigation->get()->toArray();
        $ree=$this->make($re);
        return view('business/goods/type',['type'=>$ree]);

    }



    /*
     * 执行添加
     */
    public function typeAdd_pro(Request $request)
    {
        $data = $request -> except('_token');

        //验证规则

        $rules = [
            'nname' => 'required | utf | between:2,8',
            'nsort' => 'required | digits_between:0,100',
        ];

        $message = [
            'nname.required' => '分类不能为空！',
            'nname.utf' => '分类必须为汉字！',
            'nname.between' => '2-8个汉字之间',
            'nsort.required' => '排序不能为空！',
            'nsort.digits_between' => '排序必须在0-100之间！',
        ];

        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            $data['nbtime'] = date('Y-m-d H:i:s');
            $data['bid'] = session('bid');
            $navigation = new Navigation();
            $re = $navigation->insert($data);
            if ($re) {

                return redirect('business/myType');
            } else {
                return back()->with(['mag'=>'6']);
            }
        } else {
            return back()->withErrors($validator);
        }


    }

    /*
     * 分类展示
      */

    public function myType()
    {
        $navigation = new Navigation();
        $data = $navigation ->get()->toArray();
        $type = $this->make($data);
        return view('business/goods/type_list',['type'=>$type]);
    }

    /*
     *删除分类
     */
    public function type_del(Request $request)
    {

        $nid = $request -> input('nid');
        
        $navigation = new Navigation();
        $goods = new Goods();
        $info = $navigation ->where('pid',$nid)->get()->toArray();  //判断是否存在子分类
        $arr = $goods ->where('nid',$nid)->get()->toArray();       //判断是否存在商品

        if (!empty($info)) {
            return back()->with(['prompt' => '此分类下存在子分类！']);
        }else if(!empty($arr)){
            return back()->with(['prompt'=>'此分类下存在商品！']);
        }else{
            $re = $navigation ->where('nid',$nid)->delete();

            if ($re) {
                return back()->with(['prompt'=>'删除成功！']);
            } else {
                return back()->with(['prompt'=>'删除失败！']);
            }
        }
    }
	
	
        /*
         *编辑分类
         *
         */
		public function type_upd(Request $request)
        {
			$nid = $request -> input('nid');
			$navigation = new Navigation();
			$re = $navigation->get()->toArray();
			$info = $navigation->where('nid',$nid)->first()->toArray();
			$ree=$this->make($re);
			return view('business/goods/type_upd',['type'=>$ree,'info'=>$info]);
		}

		/*
		 * 执行分类编辑
		 */

		public function typeUpd_pro(Request $request)
        {
            $data = $request -> except('_token');
            //验证规则

            $rules = [
                'nname' => 'required | utf | between:2,8',
                'nsort' => 'required | digits_between:1,2',
            ];

            $message = [
                'nname.required' => '分类不能为空！',
                'nname.utf' => '分类必须为汉字！',
                'nname.between' => '2-8个汉字之间',
                'nsort.required' => '排序不能为空！',
                'nsort.digits_between' => '排序必须是数字在0-99之间！',
            ];

            $validator = Validator::make($data, $rules, $message);
            if ($validator->passes()) {

                $navigation = new Navigation();
                $re = $navigation->where('nid',$data['nid'])->update($data);

                if($re){
                    return redirect('business/myType');
                }else {
                    return back()->with(['mag' => '修改失败！']);
                }

                } else {
                return back()->withErrors($validator);
            }
   }

	/*
	 * 商品添加页面
	 */
	public function goodsAdd()
    {
        $h_c = new Hotel_class();
        $re = $h_c->get()->toArray();

        return view('business/goods/goods_add',['type'=>$re]);
    }
     /*
      * 执行商品添加
      */
    public function goodsAdd_pro(Request $request)
    {
        $hotel = new Hotel();
        $goodsimg = new Goodsimg();
        $data = $request->except('_token','gimg');

        $rules = [
            'h_name' => 'required|between:2,10',
            'h_price'=>'required|integer',
            'h_stock'=>'required|integer',
            'hc_id'=>'integer',
            'province'=>'required',
            'city'=>'required',
            'county'=>'required',
            'h_home'=>'required|between:2,100'
        ];
        $message = [
            'h_name.required'    =>'酒店名称不能为空！',
            'h_name.between'     =>'酒店名称长度必须在2到10位之间！',
            'h_name.unique'      =>'酒店名称已经占用！',
            'h_price.required'   =>'酒店价格不能为空！',
            'h_price.integer'    =>'酒店价格必须为整数！',
            'h_stock.required'   =>'酒店数量不能为空！',
            'h_stock.integer'    =>'酒店数量必须为整数！',
            'hc_id.integer'        =>'请选择商品分类！',
            'province.required' =>'请选择酒店所在地区！',
            'city.required'      =>'请选择酒店所在地区！',
            'province.required' =>'请选择酒店所在地区！',
            'h_home.required'    =>'酒店详细地址不能为空！',
            'h_home.between'     =>'酒店详细地址长度必须在2到100位之间！'
        ];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            $data['b_id'] = session('bid');

            $data['h_place'] = $data['province'].','.$data['city'].','.$data['county'];
            unset($data['province'],$data['city'],$data['county']);

            if($h_id=$hotel->insertGetId($data)){
                if ($request->hasFile('gimg')) {
                    foreach($_FILES['gimg']['name'] as $k => $v){
                        $file['name'] = $_FILES['gimg']['name'][$k];
                        $file['type'] = $_FILES['gimg']['type'][$k];
                        $file['tmp_name'] = $_FILES['gimg']['tmp_name'][$k];
                        $file['error'] = $_FILES['gimg']['error'][$k];
                        $file['size'] = $_FILES['gimg']['size'][$k];
                        $arr[$k]['gimg'] = \FileUp::image($file);
                        $arr[$k]['gid'] = $h_id;
                    }
                    if($goodsimg->insert($arr)){
                        return back()->with(['b_error'=>'6']);
                    }else{
                        return back()->with(['b_error'=>'7']);
                    }
                }
            }else{
                return back()->with(['b_error'=>'8']);
            }
        } else {
            return back()->withErrors($validator);
        }
    }


    /*
     * 商品列表
     */
    public function goodsList()
    {

        $hotel = new Hotel();
        $h_c = new Hotel_class();
        $data=$hotel->orderBy('h_id', 'desc') ->paginate(3);

        foreach($data as $k=>$v){
            $data[$k]->hc_name=$h_c->where('hc_id',$v->hc_id)->value('hc_name');
        }

        return view('business/goods/goods_list')->with('tasks', $data);
    }
    /*
     * 商品删除
     */
    public function goodsDel(Request $request){
        
        $h_id=$request->input('h_id');
        $hotel = new Hotel();
        $goodsimg = new Goodsimg();
        $bool=DB::transaction(function () use($h_id, $hotel, $goodsimg) {
            $hotel->where('h_id',$h_id)->delete();
            $goodsimg->where('gid',$h_id)->delete();
        });

        if($bool){
            return redirect('business/goodsList')->with(['h_error'=>'2']);
        }else{
            return redirect('business/goodsList')->with(['h_error'=>'1']);

        }
    }

    /*
     * 商品编辑
     */
    public function goodsUpd(Request $request){
        $h_id=$request->input('h_id');
        $hotel = new Hotel();
        $goodsimg = new Goodsimg();
        $h_c = new Hotel_class();
        $re = $h_c->get()->toArray();
        $info = $hotel->where('h_id',$h_id)->first()->toArray();
        $img = $goodsimg->where('gid',$h_id)->get()->toArray();

        return view('business/goods/goods_upd',['type'=>$re,'info'=>$info,'img'=>$img]);
    }


}
