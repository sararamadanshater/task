<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Supervisor extends Authenticatable
{
    protected $fillable = [
       'id','username','phone', 'email','avatar', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
}
