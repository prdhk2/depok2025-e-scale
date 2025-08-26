<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScavengersWeightData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role_id',
        'no_order',
        'mlo',
        'plastic',
        'gabruk',
        'botol_plastik',
        'kertas',
        'kardus',
        'botol_kaca',
        'aqua_gelas',
        'botol_biru',
        'gelas_polos',
        'gelas_warna',
        'gelas_bunga_besar',
        'gelas_yakult_kecil',
        'gelas_yakult_besar',
        'botol_polos_putih',
        'atom_warna_putih',
        'gelang_galon',
        'tutup',
        'tutup_galon_besar',
        'impek_regas',
        'emperan_warna_warni',
        'mainan_warna',
        'botol_bening_lemes',
        'incenerator'
    ];
}
