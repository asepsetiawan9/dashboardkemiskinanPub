<?php

namespace App\Imports;

use App\Models\Poverty;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataManagementImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    private $tahun;

    public function __construct($tahun)
    {
        $this->tahun = $tahun;
    }
    public function model(array $row)
    {
        $status_bantuan = "1";
        $row = array_map('strtoupper', $row);
         

        if ($row['kepesertaan_dtks'] === 'YA' ||
            $row['penerima_bpnt'] === 'YA' ||
            $row['penerima_bpum'] === 'YA' ||
            $row['penerima_bst'] === 'YA' ||
            $row['penerima_pkh'] === 'YA' ||
            $row['penerima_sembako'] === 'YA'
        ) {
            $status_bantuan = "2";
        }
        //  dd($status_bantuan);
        return new poverty([
            'id_p3ke' => $row['id_keluarga_p3ke'],
            'id_kecamatan' => $row['id_kecamatan'],
            'id_desa' => $row['id_desa'],
            'id_kemendagri' => $row['kode_kemendagri'],
            'desil' => $row['desil_kesejahteraan'],
            'alamat' => $row['alamat'],
            'provinsi' => $row['provinsi'],
            'kabupaten' => $row['kabupaten'],
            'id_individu' => $row['id_individu'],
            'nama' => $row['nama_lengkap'],
            'nik' => $row['nik'],
            'padan_dukcapil' => $row['padan_dukcapil'],
            'jk' => $row['jenis_kelamin'],
            'status' => $row['hubungan_dengan_kepala_keluarga'],
            'tgl' => $row['tanggal_lahir'],
            'status_kawin' => $row['status_kawin'],
            'jenis_pekerjaan' => $row['pekerjaan'],
            'pendidikan_terakhir' => $row['pendidikan'],
            'dibawah_7' => $row['usia_dibawah_7_tahun'],
            'usia_7_12' => $row['usia_7_12'],
            'usia_13_15' => $row['usia_13_15'],
            'usia_16_18' => $row['usia_16_18'],
            'usia_19_21' => $row['usia_19_21'],
            'usia_22_59' => $row['usia_22_59'],
            'lebih_60' => $row['usia_60_tahun_keatas'],
            'bpnt' => $row['penerima_bpnt'],
            'bpum' => $row['penerima_bpum'],
            'bst' => $row['penerima_bst'],
            'pkh' => $row['penerima_pkh'],
            'sembako' => $row['penerima_sembako'],
            'stunting' => $row['resiko_stunting'],
            'dtks' => $row['kepesertaan_dtks'],
            'verifikasi' => $row['verifikasi_lapangan'],
            'penghasilan_perbulan' => $row['pendapatan'],
            'tahun_input' => $this->tahun,    
            'status_bantuan' => $status_bantuan,
        ]);
    }
}
