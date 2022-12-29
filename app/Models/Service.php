<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable =['service','definition','driver_id'];

    public function driver(){
        return $this->belongsTo(Driver::class);
    }
}
