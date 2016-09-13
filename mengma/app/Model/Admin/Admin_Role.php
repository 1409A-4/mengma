<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin_Role extends Model
{
    public $timestamps = false;
    protected $table = 'admin_role';
    protected $primaryKey='id';
}
