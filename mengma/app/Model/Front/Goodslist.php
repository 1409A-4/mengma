<?php

namespace App\Model\Front;

use Illuminate\Database\Eloquent\Model;

class Goodslist extends Model
{
    public $timestamps = false;
    protected $table = 'goodslist';
    protected $primaryKey='lid';
}