<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class couriers extends Model
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
