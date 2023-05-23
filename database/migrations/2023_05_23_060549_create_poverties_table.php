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
        Schema::create('poverties', function (Blueprint $table) {
            $table->id();
            $table->integer('nik')->nullable();
            $table->string('nama')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('status')->nullable();
            $table->integer('kk')->nullable();
            $table->string('jk')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('desa')->nullable();
            $table->date('tgl')->nullable();
            $table->text('foto_diri')->nullable();
            $table->string('status_pendidikan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('tempat_tinggal')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('jenis_pekerjaan')->nullable();
            $table->string('sumber_air_minum')->nullable();
            $table->string('bahan_bakar_memasak')->nullable();
            $table->text('foto_rumah')->nullable();
            $table->string('desil')->nullable();
            $table->integer('penghasilan')->nullable();
            $table->string('dtks')->nullable();
            $table->integer('penghasilan_perbulan')->nullable();
            $table->text('bantuan_diterima')->nullable();
            $table->year('tahun_input')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poverties');
    }
};
