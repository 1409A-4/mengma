<?php

namespace App\Model\Index;

use Illuminate\Database\Eloquent\Model;

class Hotelorder extends Model
{
    public $timestamps = false;
    protected $table = 'hotel_order';
    protected $primaryKey='ho_id';
}