<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    protected $fillable = ['name'];

    public function drivers(): HasMany
    {
        return $this->hasMany(Driver::class, 'branch_id', 'id');
    }

}
