<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScavengersWeightData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role',
        'no_order',
        'mlo',
        'plastic',
        'gabruk'
    ];
}
