<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempMonitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'Tmp_Icn',
        'Tmp_Dct',
        'Tmp_Prl'
    ];
}
