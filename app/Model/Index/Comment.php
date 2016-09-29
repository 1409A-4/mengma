<?php

namespace App\Model\Index;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $table = 'comment';
    protected $primaryKey='c_id';
}