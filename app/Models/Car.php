<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    protected $fillable = ['name'];

    public function drivers(): HasMany
    {
        return $this->hasMany(Driver::class, 'car_id', 'id');
    }
}
