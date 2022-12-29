<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use SoftDeletes;
    protected $fillable = [
         'driver', 'owner', 'tel_d', 'tel_o', 'car_id', 'car_number', 'branch_id', 'c_start', 'c_end', 'l_cost', 'l_start', 'l_end', 'payment','account'];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
    public function services():HasMany
    {
        return $this->hasMany(Service::class)->orderBy('created_at','DESC');
    }
    public function bonuses(): HasMany
    {
        return $this->hasMany(Bonus::class)->orderBy('created_at','DESC');
    }
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class)->orderBy('created_at','DESC');
    }

    public function  checker()
   {
       if (Carbon::parse($this->l_start)->day === Carbon::now()->day ||
           Carbon::parse($this->l_start)->addDays(1)->day === Carbon::now()->day ||
           Carbon::parse($this->l_start)->addDays(2)->day === Carbon::now()->day ||
           Carbon::parse($this->l_start)->addDays(3)->day === Carbon::now()->day ||
           Carbon::parse($this->l_start)->addDays(4)->day === Carbon::now()->day ||
           Carbon::parse($this->l_start)->addDays(5)->day === Carbon::now()->day) {
           return true;
       }
       else {
           return false;
       }
   }
}
