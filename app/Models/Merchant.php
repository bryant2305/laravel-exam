<?php

namespace App\Models;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Merchant extends Authenticatable
{
    protected $fillable = ['name', 'email', 'shop_name','password'];
    protected $hidden = ['password'];
    
}
