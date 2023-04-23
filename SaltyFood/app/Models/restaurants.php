<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class restaurants extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'email',
        'r_name',
        'password',
        'address',
        'city_postalcode',
        'available'
    ];
    protected $hidden = [
        'password'
    ];
}
