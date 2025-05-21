<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CarWeightData extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_order',
        'driver_id',
        'customer_id',
        'weight_in',
        'time_in',
        'weight_out',
        'time_out'
    ];

    public function driver() {
        return $this->belongsTo(CardMember::class, 'driver_id');
    }

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
