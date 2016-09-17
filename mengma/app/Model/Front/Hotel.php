<?php

namespace App\Model\Front;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public $timestamps = false;
    protected $table = 'hotel';
    protected $primaryKey='h_id';

//    public function hoteltype(){
//
//        return $this->belongsTo("App\Model\Front\Hoteltype", 'ht_id','ht_id');
//    }
}
