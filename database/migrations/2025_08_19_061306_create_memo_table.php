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
        Schema::create('memo', function (Blueprint $table) {
            $table->id();
            $table->string('tujuan');
            $table->string('perihal');
            $table->string('sifat_surat');
            $table->string('file');
            $table->string('isi_surat');
            $table->date('tgl_surat');
            $table->string('no_surat');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memo');
    }
};
