<?php

namespace App\Model\Index;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false;
    protected $table = 'group';
    protected $primaryKey='g_id';
}
