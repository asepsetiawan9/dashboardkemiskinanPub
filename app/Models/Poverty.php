<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poverty extends Model
{
    use HasFactory;
    protected $table = 'poverties';
    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'id_kecamatan',
        'tempat_lahir',
        'status',
        'kk',
        'jk',
        'rt',
        'rw',
        'id_desa',
        'tgl',
        'foto_diri',
        'status_pendidikan',
        'pekerjaan',
        'tempat_tinggal',
        'pendidikan_terakhir',
        'jenis_pekerjaan',
        'sumber_air_minum',
        'bahan_bakar_memasak',
        'foto_rumah',
        'desil',
        'dtks',
        'pkh',
        'penghasilan_perbulan',
        'bantuan_diterima',
        'tahun_input',
        'sumber_penerangan_utama',
        'bab',
        // 'status_bantuan',
        'id_p3ke',
        'id_kemendagri',
        'id_individu',
        'padan_dukcapil',
        'status_kawin',
        'bpnt',
        'bpum',
        'bst',
        'sembako',
        'stunting',
        'verifikasi',
        'dibawah_7',
        'usia_7_12',
        'usia_13_15',
        'usia_16_18',
        'usia_19_21',
        'usia_22_59',
        'lebih_60',
        'status_bantuan',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id');
    }

    public function assistance()
    {
        return $this->hasOne(Assistance::class, 'id_poverty', 'id');
    }

}
