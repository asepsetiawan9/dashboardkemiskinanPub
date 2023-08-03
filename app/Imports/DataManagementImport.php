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
    public function model(array $row)
    {
        $status_bantuan = "1";
        //  dd($row);

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
            'tahun_input' => $row['tahun_input'],
            'desil' => $row['desil_kesejahteraan'],
            'id_p3ke' => $row['id_keluarga_p3ke'],
            'id_kemendagri' => $row['kode_kemendagri'],
            'id_individu' => $row['id_individu'],
            'padan_dukcapil' => $row['padan_dukcapil'],
            'nik' => $row['nik'],
            'nama' => $row['nama_lengkap'],
            'alamat' => $row['alamat'],
            'id_kecamatan' => $row['id_kecamatan'],
            'id_desa' => $row['id_desa'],
            'status' => $row['hubungan_dengan_kepala_keluarga'],
            'jk' => $row['jenis_kelamin'],
            'tgl' => $row['tanggal_lahir'],
            'pendidikan_terakhir' => $row['pendidikan'],
            'jenis_pekerjaan' => $row['pekerjaan'],
            'penghasilan_perbulan' => $row['pendapatan'],
            'dtks' => $row['kepesertaan_dtks'],
            'bpnt' => $row['penerima_bpnt'],
            'bpum' => $row['penerima_bpum'],
            'bst' => $row['penerima_bst'],
            'pkh' => $row['penerima_pkh'],
            'sembako' => $row['penerima_sembako'],
            'stunting' => $row['resiko_stunting'],
            'verifikasi' => $row['verifikasi_lapangan'],
            'dibawah_7' => $row['usia_dibawah_7_tahun'],
            'usia_7_12' => $row['usia_7_12'],
            'usia_13_15' => $row['usia_13_15'],
            'usia_16_18' => $row['usia_16_18'],
            'usia_19_21' => $row['usia_19_21'],
            'usia_22_59' => $row['usia_22_59'],
            'lebih_60' => $row['usia_60_tahun_keatas'],
            'status_bantuan' => $status_bantuan,
        ]);
    }
}
