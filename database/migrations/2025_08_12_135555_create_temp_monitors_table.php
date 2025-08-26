<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('temp_monitors', function (Blueprint $table) {
            $table->id();
            $table->integer('Tmp_Icn');
            $table->integer('Tmp_Dct');
            $table->integer('Tmp_Prl');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('temp_monitors');
    }
};