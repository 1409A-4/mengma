<?php

namespace App\Model\Business;

use Illuminate\Database\Eloquent\Model;

class Hotel_class extends Model
{
    public $timestamps = false;
    protected $table = 'hotel_class';
    protected $primaryKey='hc_id';
}
