<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    public $timestamps = false;
    protected $table = 'power';
    protected $primaryKey='pid';
}
