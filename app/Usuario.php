<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'senha',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $table = 'users';
}
