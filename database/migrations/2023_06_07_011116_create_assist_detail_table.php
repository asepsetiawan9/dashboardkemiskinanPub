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
        Schema::create('assist_detail', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_assistance');
            $table->string('nama_bantuan');
            $table->string('pemberi_bantuan');
            $table->text('bukti');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assist_detail');
    }
};
