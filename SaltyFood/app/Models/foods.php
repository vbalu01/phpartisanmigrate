<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class foods extends Model
{
    use HasFactory;
    public function restaurant(): HasOne
    {
        return $this->hasOne(restaurants::class);
    }
    public function category(): HasOne
    {
        return $this->hasOne(categories::class);
    }
}
