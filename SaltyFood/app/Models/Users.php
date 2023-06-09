<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'email',
        'password',
        'u_fullname',
    ];
    protected $primaryKey = 'id';
    public $incrementing = true;
}
