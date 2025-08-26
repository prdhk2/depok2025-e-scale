<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScavengerMemberCards extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'uid',
        'user_id',
        'name'
    ];
}
