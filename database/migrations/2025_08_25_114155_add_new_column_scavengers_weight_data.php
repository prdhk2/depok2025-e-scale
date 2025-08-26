<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('scavengers_weight_data', function(Blueprint $table) {
            $table->float('botol_biru', 10, 2)->nullable()->after('aqua_gelas'); // Ganti 'column_name' dengan kolom sebelumnya
            $table->float('gelas_polos', 10, 2)->nullable();
            $table->float('gelas_warna', 10, 2)->nullable();
            $table->float('gelas_bunga_besar', 10, 2)->nullable();
            $table->float('gelas_yakult_kecil', 10, 2)->nullable();
            $table->float('gelas_yakult_besar', 10, 2)->nullable();
            $table->float('botol_polos_putih', 10, 2)->nullable();
            $table->float('atom_warna_putih', 10, 2)->nullable();
            $table->float('gelang_galon', 10, 2)->nullable();
            $table->float('tutup', 10, 2)->nullable();
            $table->float('tutup_galon_besar', 10, 2)->nullable();
            $table->float('impek_regas', 10, 2)->nullable();
            $table->float('emperan_warna_warni', 10, 2)->nullable();
            $table->float('mainan_warna', 10, 2)->nullable();
            $table->float('botol_bening_lemes', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scavengers_weight_data', function (Blueprint $table) {
            $table->dropColumn(['botol_biru', 'gelas_polos', 'gelas_warna', 'gelas_bunga_besar', 'gelas_yakult_kecil', 'gelas_yakult_besar', 'botol_polos_putih', 'gelang_galon', 'tutup', 'tutup_galon_besar', 'impek_regas', 'emperan_warna_warni', 'mainan_warna', 'botol_bening_lemes']);
        });
    }
};