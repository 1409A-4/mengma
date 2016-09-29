<?php

namespace App\Model\Index;

use Illuminate\Database\Eloquent\Model;

class Project_type extends Model
{
    public $timestamps = false;
    protected $table = 'Project_type';
    protected $primaryKey='prt_id';
}
