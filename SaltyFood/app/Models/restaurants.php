<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class restaurants extends Model
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
