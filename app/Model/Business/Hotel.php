<?php

namespace App\Model\Business;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public $timestamps = false;
    protected $table = 'hotel';
    protected $primaryKey='h_id';
}
