<?php

namespace App\Model\Index;

use Illuminate\Database\Eloquent\Model;

class Hotelimg extends Model
{
    public $timestamps = false;
    protected $table = 'hotel_img';
    protected $primaryKey='i_id';
}