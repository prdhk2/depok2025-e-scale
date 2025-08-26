<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('scavengers_weight_data', function (Blueprint $table) {
            $table->float('botol_plastik', 10, 2)->nullable()->after('gabruk'); // Ganti 'column_name' dengan kolom sebelumnya
            $table->float('kertas', 10, 2)->nullable();
            $table->float('kardus', 10, 2)->nullable();
            $table->float('botol_kaca', 10, 2)->nullable();
            $table->float('aqua_gelas', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('scavenger_weight_data', function (Blueprint $table) {
            $table->dropColumn(['botol_plastik', 'kertas', 'kardus', 'botol_kaca', 'aqua_gelas']);
        });
    }
};