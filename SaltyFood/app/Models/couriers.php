<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class couriers extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'email',
        'password',
        'c_name',
        'available'
    ];
    protected $hidden = [
        'password'
    ];
}
