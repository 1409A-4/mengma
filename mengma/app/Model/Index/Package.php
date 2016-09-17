<?php

namespace App\Model\Index;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public $timestamps = false;
    protected $table = 'package';
    protected $primaryKey='p_id';
}
