<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
class orders extends Model
{
    use HasFactory;
    public function address(): HasOne
    {
        return $this->hasOne(addresses::class);
    }
    public function currier(): HasOne
    {
        return $this->hasOne(curriers::class);
    }
}
