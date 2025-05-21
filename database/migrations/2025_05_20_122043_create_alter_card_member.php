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
        Schema::table('card_members', function (Blueprint $table) {

            $table->string('card_number')->after('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('card_members', function (Blueprint $table) {

        });
    }
};
