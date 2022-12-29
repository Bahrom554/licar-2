<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
       'driver_id','account','type'
    ];

    public const CREDIT_CARD =1;
    public const CASH=2;
    public const OTHER=3;

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
