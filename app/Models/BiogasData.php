<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BiogasData extends Model
{
    use HasFactory;

    protected $fillable = [
        'ph_1',
        'ph_2',
        'ph_3',
        'ph_4',
        'ph_5',
        'ph_6',
        'ph_7',
        'gas_value_1',
        'pressureGas_1',
        'temperatureGas_1',
        'gas_value_2',
        'pressureGas_2',
        'temperatureGas_2',
        'Balloon_1',
        'Balloon_2',
        'Balloon_3',
        'Balloon_4'
    ];
}
