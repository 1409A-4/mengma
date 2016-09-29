<?php

namespace App\Model\Index;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;
    protected $table = 'project';
    protected $primaryKey='pro_id';
}
