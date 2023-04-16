<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class orderFoods extends Model
{
    use HasFactory;
    public function order(): HasOne
    {
        return $this->hasOne(orders::class);
    }
    public function food(): HasOne
    {
        return $this->hasOne(foods::class);
    }
}
