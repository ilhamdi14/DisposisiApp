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
        Schema::create('memopimpinan', function (Blueprint $table) {
            $table->id();
            $table->string('perihal');
            $table->string('sifat_surat');
            $table->string('catatan');
            $table->string('status');
            $table->unsignedBigInteger('pimpinan_id');
            $table->foreign('pimpinan_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memopimpinan');
    }
};
