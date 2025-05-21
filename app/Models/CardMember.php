<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class CardMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_number',
        'driver',
        'no_pol',
        'car_type'
    ];

}
