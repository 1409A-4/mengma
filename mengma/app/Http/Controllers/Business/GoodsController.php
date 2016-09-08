<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Business\Navigation;
use App\Model\Business\Goods;
use App\Model\Business\Goodsimg;
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
                return back()->with(['mag'=>'添加失败！']);
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
        $navigation = new Navigation();
        $re = $navigation->get()->toArray();
        $ree = $this->make($re);
        return view('business/goods/goods_add',['type'=>$ree]);
    }
     /*
      * 执行商品添加
      */
    public function goodsAdd_pro(Request $request)
    {
        $goods = new Goods();
        $goodsimg = new Goodsimg();
        $data = $request->except('_token','gimg');

        $rules = [
            'gname' => 'required|between:2,10|unique:goods',
            'gprice'=>'required|integer',
            'gstock'=>'required|integer',
            'nid'=>'integer',
            'province'=>'required',
            'city'=>'required',
            'county'=>'required',
            'ghome'=>'required|between:2,100'
        ];
        $message = [
            'gname.required'    =>'商品名称不能为空！',
            'gname.between'     =>'商品名称长度必须在2到10位之间！',
            'gname.unique'      =>'商品名称已经占用！',
            'gprice.required'   =>'商品价格不能为空！',
            'gprice.integer'    =>'商品价格必须为整数！',
            'gstock.required'   =>'商品库存不能为空！',
            'gstock.integer'    =>'商品库存必须为整数！',
            'nid.integer'        =>'请选择商品分类！',
            'province.required' =>'请选择商品所在地区！',
            'city.required'      =>'请选择商品所在地区！',
            'province.required' =>'请选择商品所在地区！',
            'ghome.required'    =>'商品详细地址不能为空！',
            'ghome.between'     =>'商品详细地址长度必须在2到100位之间！'
        ];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            $data['bid'] = session('bid');
            $data['gbtime'] = date('Y-m-d H:i:s');
            $data['gaddress'] = $data['province'].','.$data['city'].','.$data['county'];
            unset($data['province'],$data['city'],$data['county']);

            if($gid=$goods->insertGetId($data)){
                if ($request->hasFile('gimg')) {
                    foreach($_FILES['gimg']['name'] as $k => $v){
                        $file['name'] = $_FILES['gimg']['name'][$k];
                        $file['type'] = $_FILES['gimg']['type'][$k];
                        $file['tmp_name'] = $_FILES['gimg']['tmp_name'][$k];
                        $file['error'] = $_FILES['gimg']['error'][$k];
                        $file['size'] = $_FILES['gimg']['size'][$k];
                        $arr[$k]['gimg'] = \FileUp::image($file);
                        $arr[$k]['gid'] = $gid;
                    }
                    if($goodsimg->insert($arr)){
                        return back()->with(['gmag'=>'添加成功！']);
                    }else{
                        return back()->with(['gmag'=>'添加图片失败！']);
                    }
                }
            }else{
                return back()->with(['gmag'=>'商品添加失败！']);
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
        $bid = session('bid');
        $goods = new Goods();
        $NG = new Navigation();
        $data=$goods->where('bid',$bid)
            ->orderBy('gid', 'desc')
            ->paginate(3);
        foreach($data as $k=>$v){
            $data[$k]->nname=$NG->where('nid',$v->nid)->value('nname');
        }

        return view('business/goods/goods_list')->with('tasks', $data);
    }
    /*
     * 商品删除
     */
    public function goodsDel(Request $request){
        $gid=$request->input('gid');
        $goods = new Goods();
        $goodsimg = new Goodsimg();
        $bool=DB::transaction(function () use($gid, $goods, $goodsimg) {
            $goods->where('gid',$gid)->delete();
            $goodsimg->where('gid',$gid)->delete();
        });

        if($bool){
            return back()->with(['gmag'=>'编号:'.$gid.'商品删除失败！']);
        }else{
            return back()->with(['gmag'=>'编号:'.$gid.'商品删除成功！']);
        }
    }

}
