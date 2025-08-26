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
        Schema::create('scavenger_member_cards', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('uid')->unique(); // UID RFID harus unik
            $table->unsignedBigInteger('user_id'); // Bisa disesuaikan tipe-nya
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scavengers_member_cards');
    }
};
