<?php

namespace App\Exports;

use App\Models\Poverty;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DataManagementExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    

    public function collection()
    {
        return Poverty::join('kecamatan', 'poverties.id_kecamatan', '=', 'kecamatan.id')
            ->join('desa', 'poverties.id_desa', '=', 'desa.id')
            ->select('poverties.*', 'kecamatan.name as kecamatan_name', 'desa.name_desa as desa_name')
            ->get();
    }

    /**
    * @var Poverty $poverty
    */
    public function map($poverty): array
    {
        $kabupaten = 'Garut';
        $statusBantuan = ($poverty->status_bantuan == 2) ? "Mendapat Bantuan" : "Belum Mendapat Bantuan";
        $stunting = $poverty->stunting === 1 ? "YA" : ($poverty->stunting === 2 ? "TIDAK" : "LAINNYA");
        $penghasilan_perbulan = number_format($poverty->penghasilan_perbulan, 0, ',', '.');

        return [
            $poverty->tahun_input,
            $poverty->desil,
            $poverty->id_p3ke,
            $poverty->id_kemendagri,
            $poverty->id_individu,
            $poverty->nik,
            $poverty->nama,
            $poverty->alamat,
            $kabupaten,
            $poverty->kecamatan_name,
            $poverty->desa_name,
            $poverty->status,
            $poverty->jk,
            $poverty->tgl,
            $poverty->pendidikan_terakhir,
            $poverty->jenis_pekerjaan,
            $penghasilan_perbulan,
            $poverty->dtks,
            $poverty->bpnt,
            $poverty->bpum,
            $poverty->bst,
            $poverty->pkh,
            $poverty->sembako,
            $stunting,
            $poverty->verifikasi,
            $poverty->dibawah_7,
            $poverty->usia_7_12,
            $poverty->usia_13_15,
            $poverty->usia_16_18,
            $poverty->usia_19_21,
            $poverty->usia_22_59,
            $poverty->lebih_60,
            $statusBantuan,
        ];
    }

    public function headings(): array
    {
        return [
            'Tahun Input',
            'Desil Kesejahteraan',
            'ID Keluarga P3KE',
            'Kode Kemendagri',
            'ID Individu',
            'NIK',
            'Nama Lengkap',
            'Alamat',
            'Kabupaten',
            'Kecamatan',
            'Desa',
            'Hubungan dengan Kepala Keluarga',
            'Jenis Kelamin',
            'Tanggal Lahir',
            'Pendidikan',
            'Pekerjaan',
            'Pendapatan',
            'Kepesertaan DTKS',
            'Penerima BPNT',
            'Penerima BPUM',
            'Penerima BST',
            'Penerima PKH',
            'Penerima SEMBAKO',
            'Resiko Stunting',
            'Verifikasi Lapangan',
            'Usia dibawah 7 Tahun',
            'Usia 7-12',
            'Usia 13-15',
            'Usia 16-18',
            'Usia 19-21',
            'Usia 22-50',
            'Usia 60 Tahun Keatas',
            'Status Bantuan'
        ];
    }
}
