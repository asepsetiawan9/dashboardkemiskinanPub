<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Population;
use App\Models\Poverty;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(request $request)
    {
        
        $latestPopulation = Population::latest()->first();

        $jml_penduduk = $latestPopulation ? $latestPopulation->jumlah_penduduk : 0;

        //jumlah  penduduk miskin tahun terakhir
        $latestYear = Poverty::max('tahun_input');
        $jml_pen_miskin = Poverty::where('tahun_input', $latestYear)->count();

        $persentasePendudukMiskin = 0;

        if ($jml_penduduk > 0) {
            $persentasePendudukMiskin = ($jml_pen_miskin / $jml_penduduk) * 100;
        }

        //jumlah desil terakhir
        $jml_desil1 = Poverty::where('desil', 1)
        ->where('tahun_input', $latestYear)->count();
        $jml_desil2 = Poverty::where('desil', 2)
        ->where('tahun_input', $latestYear)->count();
        $jml_desil3 = Poverty::where('desil', 3)
        ->where('tahun_input', $latestYear)->count();
        $jml_desil4 = Poverty::where('desil', 4)
        ->where('tahun_input', $latestYear)->count();
        $jml_desil5 = Poverty::where('desil', 5)
        ->where('tahun_input', $latestYear)->count();
        $jml_desil6 = Poverty::where('desil', 6)
        ->where('tahun_input', $latestYear)->count();
        $jml_desil7 = Poverty::where('desil', 7)
        ->where('tahun_input', $latestYear)->count();

        //ambil semua tahun
        $years = Poverty::distinct('tahun_input')->pluck('tahun_input')->toArray();
        
        $status = Poverty::distinct('status')->pluck('status')->toArray();
    
        //ambil semua nilai pertahun
        $dataCountByYear = [];
        foreach ($years as $year) {
            $count = Poverty::where('tahun_input', $year)->count();
            $dataCountByYear[] = $count;
        }
        //ambil semua tahun
        $kecId = Poverty::distinct('id_kecamatan')->pluck('id_kecamatan')->toArray();
        $kecLabels = Poverty::join('kecamatan', 'poverties.id_kecamatan', '=', 'kecamatan.id')
            ->distinct('kecamatan.name')
            ->pluck('kecamatan.name')
            ->toArray();

        //ambil semua nilai pertahun
        $kecValue = [];
        foreach ($kecId as $kec) {
            $count = Poverty::where('id_kecamatan', $kec)->count();
            $kecValue[] = $count;
        }
        

        $nameDes = Poverty::join('kecamatan', 'poverties.id_kecamatan', '=', 'kecamatan.id')
        ->where('tahun_input', $latestYear)
        ->distinct('kecamatan.name')
        ->pluck('kecamatan.name')
        ->toArray();

        //ambil semua nilai pertahun
        $desValue = [];
        foreach ($kecId as $kec) {
            $count = Poverty::where('id_kecamatan', $kec)->count();
            $kecValue[] = $count;
        }
        $message = 'kosong';
        // dd($desValue);
        return view('pages.dashboard', compact('latestPopulation', 'jml_pen_miskin', 'persentasePendudukMiskin', 'jml_desil1', 'jml_desil2', 'jml_desil3', 'jml_desil4', 'jml_desil5','jml_desil6','jml_desil7', 'years',
        'dataCountByYear', 'kecLabels', 'kecId',
        'kecValue', 'message', 'nameDes', 'desValue', 'status', 'latestYear'));
    }

    public function filterKecamatan(Request $request)
    {
       
        $selectedYear = $request->input('year');
        $kecId = $request->input('kecId');
        $status = $request->input('status');
        $selectedYear = $request->input('year');

        $kecLabel = $request->input('kecLabel');
        $kecLabel = strtolower($kecLabel);
        $kecLabel = str_replace(' ', '_', $kecLabel);

        $status_bantuan = null;

        if ($status !== 'all') {

            $status_bantuan = Poverty::where('status_bantuan', $status);
        } else {

            $status_bantuan = Poverty::query();
        }

        if ($selectedYear !== 'all') {
            $status_bantuan = $status_bantuan->where('tahun_input', $selectedYear);
        }

        if ($kecId !== 'kecamatan') {
            $status_bantuan = $status_bantuan->where('id_kecamatan', $kecId);
        }
        $status_bantuan = $status_bantuan->get();

        $population = Population::where('tahun', $selectedYear)->first();
        $jml_penduduk = $population ? $population->{$kecLabel} : 0;

        $id_desa = $status_bantuan->where('id_kecamatan', $kecId)->pluck('id_desa')->unique()->toArray();
        $jml_pen_miskin = $status_bantuan->count();

        if ($jml_penduduk > 0) {
            $persentasePendudukMiskin = ($jml_pen_miskin / $jml_penduduk) * 100;
        } else {

            $persentasePendudukMiskin = 0;
        }
        
        // jumlah desil
        $jml_desil1 = $status_bantuan->where('desil', 1)->count();
        $jml_desil2 = $status_bantuan->where('desil', 2)->count();
        $jml_desil3 = $status_bantuan->where('desil', 3)->count();
        $jml_desil4 = $status_bantuan->where('desil', 4)->count();
        $jml_desil5 = $status_bantuan->where('desil', 5)->count();
        $jml_desil6 = $status_bantuan->where('desil', 6)->count();
        $jml_desil7 = $status_bantuan->where('desil', 7)->count();
// dd($jml_desil1, $jml_desil2, $jml_desil3, $jml_desil4, $jml_desil5, $jml_desil6, $jml_desil7);
        $years = Poverty::distinct('tahun_input')->pluck('tahun_input')->toArray();
        $dataCountByYear = [];
        if ($status !== 'all') {
            foreach ($years as $year) {
                $count = Poverty::where('tahun_input', $year)->where('status_bantuan', $status)->count();
                $dataCountByYear[] = $count;
            }
        }else{
            foreach ($years as $year) {
                $count = Poverty::where('tahun_input', $year)->count();
                $dataCountByYear[] = $count;
            }
        }

        if ($kecId === "kecamatan") {
            $kecIdList = Poverty::distinct('id_kecamatan')->pluck('id_kecamatan')->toArray();

            if ($status === 'all') {

                $nameDes = Poverty::join('kecamatan', 'poverties.id_kecamatan', '=', 'kecamatan.id')
                    ->where('tahun_input', $selectedYear)
                    ->distinct('kecamatan.name')
                    ->pluck('kecamatan.name')
                    ->toArray();


                $desValue = Poverty::whereIn('id_kecamatan', $kecIdList)
                    ->where('tahun_input', $selectedYear)
                    ->get()
                    ->groupBy('id_kecamatan')
                    ->map(fn($group) => $group->count())
                    ->values()
                    ->toArray();
            } else {

                $nameDes = Poverty::join('kecamatan', 'poverties.id_kecamatan', '=', 'kecamatan.id')
                    ->where('status_bantuan', $status)
                    ->where('tahun_input', $selectedYear)
                    ->distinct('kecamatan.name')
                    ->pluck('kecamatan.name')
                    ->toArray();


                $desValue = Poverty::whereIn('id_kecamatan', $kecIdList)
                    ->where('status_bantuan', $status)
                    ->where('tahun_input', $selectedYear)
                    ->get()
                    ->groupBy('id_kecamatan')
                    ->map(fn($group) => $group->count())
                    ->values()
                    ->toArray();
            }
        } else {
            $nameDes = Poverty::join('desa', 'poverties.id_desa', '=', 'desa.id')
                ->where('poverties.id_kecamatan', $kecId)
                ->when($status !== 'all', function ($query) use ($status) {
                    return $query->where('poverties.status_bantuan', $status);
                })
                ->where('tahun_input', $selectedYear)
                ->distinct('desa.name_desa')
                ->pluck('desa.name_desa')
                ->toArray();
        
            $desValue = [];
            foreach ($id_desa as $des) {
                $count = Poverty::where('id_desa', $des)
                    ->when($status !== 'all', function ($query) use ($status) {
                        return $query->where('status_bantuan', $status);
                    })
                    ->where('tahun_input', $selectedYear)
                    ->count();
                $desValue[] = $count;
            }
        }
        
        $message = [
            'jml_penduduk' => number_format($jml_penduduk),
            'jml_pen_miskin' => number_format($jml_pen_miskin),
            'persentase_penduduk_miskin' => round($persentasePendudukMiskin, 2),
            'jml_desil1' => number_format($jml_desil1),
            'jml_desil2' => number_format($jml_desil2),
            'jml_desil3' => number_format($jml_desil3),
            'jml_desil4' => number_format($jml_desil4),
            'jml_desil5' => number_format($jml_desil5),
            'jml_desil6' => number_format($jml_desil6),
            'jml_desil7' => number_format($jml_desil7),
            'years' => $years,
            'dataCountByYear' => $dataCountByYear,
            'nameDes' => $nameDes,
            'desValue' => $desValue,
        ];

        return response()->json(['message' => $message]);
    }


}
