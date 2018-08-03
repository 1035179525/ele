<?php

namespace App\Models;

use App\Providers\AuthServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasRoles;
    protected $guard_name = 'admin';
    //可以修改的字段
    public $fillable=["name","password","email"];
}
