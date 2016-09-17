<?php

namespace App\Model\Front;

use Illuminate\Database\Eloquent\Model;

class Hoteltype extends Model
{
    public $timestamps = false;
    protected $table = 'hotel_type';
    protected $primaryKey='ht_id';
}
