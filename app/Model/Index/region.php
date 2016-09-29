<?php

namespace App\Model\Index;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $timestamps = false;
    protected $table = 'region';
    protected $primaryKey='reg_id';
}
