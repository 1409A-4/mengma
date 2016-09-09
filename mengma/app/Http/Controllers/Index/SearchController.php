<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\VerifyCsrfToken;
use App\model\Front\Hotel;

class SearchController extends Controller
{
    /*
     *  酒店搜索
     */
     public function search_hotel(Request $request){
         $data = $request->except('_token');
         $arr = Hotel::where('h_place','=',$data['province'])->get()->toArray();
         //return view('index/酒店搜索跳转地址');
     }
}