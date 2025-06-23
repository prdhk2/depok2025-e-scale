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
        Schema::create('biogas_data', function (Blueprint $table) {
            $table->id();
            $table->float('ph_1')->nullable();
            $table->float('ph_2')->nullable();
            $table->float('ph_3')->nullable();
            $table->float('ph_4')->nullable();
            $table->float('ph_5')->nullable();
            $table->float('ph_6')->nullable();
            $table->float('ph_7')->nullable();
            $table->float('gas_value_1')->nullable();
            $table->float('pressureGas_1')->nullable();
            $table->float('temperatureGas_1')->nullable();
            $table->float('gas_value_2')->nullable();
            $table->float('pressureGas_2')->nullable();
            $table->float('temperatureGas_2')->nullable();
            $table->float('Balloon_1')->nullable();
            $table->float('Balloon_2')->nullable();
            $table->float('Balloon_3')->nullable();
            $table->float('Balloon_4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biogas_data');
    }
};
