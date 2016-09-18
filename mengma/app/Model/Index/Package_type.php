<?php

namespace App\Model\Index;

use Illuminate\Database\Eloquent\Model;

class Package_type extends Model
{
    public $timestamps = false;
    protected $table = 'package_type';
    protected $primaryKey='pt_id';
}
