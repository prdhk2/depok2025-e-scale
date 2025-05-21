<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('car_weight_data', function (Blueprint $table) {
            $table->id();
            $table->string('no_order');
            $table->foreignId('driver_id')->constrained('card_members')->onDelete('cascade'); // Relasi ke tabel users
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->float('weight_in');
            $table->dateTime('time_in');
            $table->float('weight_out')->nullable();
            $table->dateTime('time_out')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_weight_data');
    }
};