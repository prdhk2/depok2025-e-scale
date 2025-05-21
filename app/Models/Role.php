<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Jika mau, bisa tambahkan relasi ke User (optional)
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
