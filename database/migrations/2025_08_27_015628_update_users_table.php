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
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_wa');
            $table->string('grade');
            $table->unsignedBigInteger('jabatan_id');
            $table->foreign('jabatan_id')->references('id')->on('jabatans');
            $table->unsignedBigInteger('instansi_id');
            $table->foreign('instansi_id')->references('id')->on('instansis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
