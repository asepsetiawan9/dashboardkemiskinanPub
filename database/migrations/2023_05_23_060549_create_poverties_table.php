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
            $table->biginteger('id_p3ke')->nullable();
            $table->biginteger('id_kemendagri')->nullable();
            $table->biginteger('id_individu')->nullable();
            $table->string('padan_dukcapil')->nullable();
            $table->string('status_kawin')->nullable();
            $table->biginteger('nik')->nullable();
            $table->string('nama')->nullable();
            $table->text('alamat')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->integer('id_kecamatan')->nullable()->default(0);
            $table->integer('id_desa')->nullable()->default(0);
            $table->string('status')->nullable();
            $table->string('jk')->nullable();
            $table->date('tgl')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('jenis_pekerjaan')->nullable();
            $table->integer('desil')->nullable();
            $table->biginteger('penghasilan_perbulan')->nullable();
            $table->year('tahun_input')->nullable();
            $table->string('bpnt')->nullable();
            $table->string('bpum')->nullable();
            $table->string('bst')->nullable();
            $table->string('dtks')->nullable();
            $table->string('sembako')->nullable();
            $table->string('stunting')->nullable();
            $table->string('verifikasi')->nullable();
            $table->string('dibawah_7')->nullable();
            $table->string('usia_7_12')->nullable();
            $table->string('usia_13_15')->nullable();
            $table->string('usia_16_18')->nullable();
            $table->string('usia_19_21')->nullable();
            $table->string('usia_22_59')->nullable();
            $table->string('lebih_60')->nullable();

           //form backup
        //    $table->string('tempat_tinggal')->nullable();
        //    $table->string('tempat_lahir')->nullable();
        //     $table->string('rt')->nullable();
        //     $table->string('kk')->nullable();
        //     $table->string('rw')->nullable();
        //     $table->text('foto_diri')->nullable();
        //     $table->string('status_pendidikan')->nullable();
        //     $table->string('pekerjaan')->nullable();
        //     $table->string('sumber_air_minum')->nullable();
        //     $table->string('bahan_bakar_memasak')->nullable();
        //     $table->text('foto_rumah')->nullable();
        //     $table->text('bantuan_diterima')->nullable();
        //     $table->string('sumber_penerangan_utama')->default(0)->nullable();
        //     $table->string('bab')->nullable();
        //     $table->string('status_bantuan')->default(1)->nullable();
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
