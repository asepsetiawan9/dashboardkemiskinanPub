<?php

namespace App\Http\Controllers;
use Storage;
use App\Models\Population;
use App\Models\Poverty;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:map-list|map-create|map-edit|map-delete', ['only' => ['index','show']]);
         
    }
    public function index()
    {
        $latestPopulation = Population::latest()->first();
        $status = Poverty::distinct('status')->pluck('status')->toArray();
        $userRole = Auth::user()->role;
        $loggedInUserKecamatanName = Auth::user()->city;
        $loggedInUserKecamatanId = Kecamatan::where('name', $loggedInUserKecamatanName)->value('id');
        $latestYear = Poverty::max('tahun_input');
        if ($userRole === "Kecamatan") {
            $jml_desil1 = Poverty::where('tahun_input', $latestYear)->where('id_kecamatan', $loggedInUserKecamatanId)
            ->where('desil',  1)
            ->count();
            $jml_desil2 = Poverty::where('tahun_input', $latestYear)->where('id_kecamatan', $loggedInUserKecamatanId)
            ->where('desil',  2)
            ->count();
            $jml_desil3 = Poverty::where('tahun_input', $latestYear)->where('id_kecamatan', $loggedInUserKecamatanId)
            ->where('desil',  3)
            ->count();
            $jml_desil4 = Poverty::where('tahun_input', $latestYear)->where('id_kecamatan', $loggedInUserKecamatanId)
            ->where('desil',  4)
            ->count();
            $jml_desil5 = Poverty::where('tahun_input', $latestYear)->where('id_kecamatan', $loggedInUserKecamatanId)
            ->where('desil',  5)
            ->count();
            $jml_desil6 = Poverty::where('tahun_input', $latestYear)->where('id_kecamatan', $loggedInUserKecamatanId)
            ->where('desil',  6)
            ->count();
            $jml_desil7 = Poverty::where('tahun_input', $latestYear)->where('id_kecamatan', $loggedInUserKecamatanId)
            ->where('desil',  7)
            ->count();
        }else{
            $jml_desil1 = Poverty::where('tahun_input', $latestYear)
            ->where('desil',  1)
            ->count();
            $jml_desil2 = Poverty::where('tahun_input', $latestYear)
            ->where('desil',  2)
            ->count();
            $jml_desil3 = Poverty::where('tahun_input', $latestYear)
            ->where('desil',  3)
            ->count();
            $jml_desil4 = Poverty::where('tahun_input', $latestYear)
            ->where('desil',  4)
            ->count();
            $jml_desil5 = Poverty::where('tahun_input', $latestYear)
            ->where('desil',  5)
            ->count();
            $jml_desil6 = Poverty::where('tahun_input', $latestYear)
            ->where('desil',  6)
            ->count();
            $jml_desil7 = Poverty::where('tahun_input', $latestYear)
            ->where('desil',  7)
            ->count();
        }
        


        //ambil semua tahun
        $years = Poverty::distinct('tahun_input')->pluck('tahun_input')->toArray();
        //ambil semua pendidikan terakhir
        $variabels = Poverty::distinct('pendidikan_terakhir')->pluck('pendidikan_terakhir')->toArray();

        //ambil semua nilai pertahun
        $dataCountByYear = [];
        foreach ($years as $year) {
            $count = Poverty::where('tahun_input', $year)->count();
            $dataCountByYear[] = $count;
        }
        //ambil semua tahun
        $kecId = Poverty::distinct('id_kecamatan')->where('tahun_input', $latestYear)->pluck('id_kecamatan')->toArray();
        $kecLabels = Poverty::join('kecamatan', 'poverties.id_kecamatan', '=', 'kecamatan.id')
            ->where('tahun_input', $latestYear)
            ->distinct('kecamatan.name')
            ->pluck('kecamatan.name')
            ->toArray();
        if ($userRole === "Kecamatan") {
            $id_desa = Poverty::where('id_kecamatan', $loggedInUserKecamatanId)->where('tahun_input', $latestYear)->pluck('id_desa')->unique()->toArray();
            // 
            $nameDes = Poverty::join('desa', 'poverties.id_desa', '=', 'desa.id')
                    ->where('poverties.id_kecamatan', $loggedInUserKecamatanId)
                    ->where('tahun_input', $latestYear)
                    ->distinct('desa.name_desa')
                    ->pluck('desa.name_desa')
                    ->toArray();
                    
            $kecValue = [];
            foreach ($id_desa as $des) {
                $count = Poverty::where('id_desa', $des)
                    ->where('tahun_input', $latestYear)
                    ->count();
                $kecValue[] = $count;
            }
            $desValue = "";
            // dd($desValue);
        }else{

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
            $kecValue = [];
            foreach ($kecId as $kec) {
                $count = Poverty::where('id_kecamatan', $kec)->where('tahun_input', $latestYear)->count();
                $kecValue[] = $count;
            }
        }
        // dd($kecId, $kecValue);
       
        $message = 'kosong';

        return view('map.index', compact('latestPopulation', 'jml_desil1', 'jml_desil2', 'jml_desil3', 'jml_desil4', 'jml_desil5',
        'jml_desil6', 'jml_desil7', 'years', 'dataCountByYear', 'kecLabels', 'kecId', 'kecValue', 'message', 'nameDes', 'desValue', 'variabels', 'status', 'latestYear', 'loggedInUserKecamatanName',
        'loggedInUserKecamatanId', 'userRole'));
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

        $selectedVar = $request->input('variable');
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

        if ($selectedVar !== 'all') {
            $status_bantuan = $status_bantuan->where('pendidikan_terakhir', $selectedVar);
        }
        $years = $status_bantuan->distinct('tahun_input')->pluck('tahun_input')->toArray();
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

        $years = Poverty::distinct('tahun_input')->pluck('tahun_input')->toArray();
        $dataCountByYear = [];
        if ($status !== 'all') {
            foreach ($years as $year) {
                $count = Poverty::where('tahun_input', $year)->where('status_bantuan', $status)->where('pendidikan_terakhir', $selectedVar)->count();
                $dataCountByYear[] = $count;
            }
        } else {
            foreach ($years as $year) {
                $count = Poverty::where('tahun_input', $year)->where('pendidikan_terakhir', $selectedVar)->count();
                $dataCountByYear[] = $count;
            }
        }

        if ($kecId === "kecamatan") {
            $kecIdList = Poverty::distinct('id_kecamatan')->pluck('id_kecamatan')->toArray();
        
            if ($status === 'all') {
                if ($selectedVar !== 'all') {
                    $nameDes = Poverty::join('kecamatan', 'poverties.id_kecamatan', '=', 'kecamatan.id')
                        ->where('tahun_input', $selectedYear)
                        ->where('pendidikan_terakhir', $selectedVar)
                        ->distinct('kecamatan.name')
                        ->pluck('kecamatan.name')
                        ->toArray();
        
                    $desValue = Poverty::whereIn('id_kecamatan', $kecIdList)
                        ->where('tahun_input', $selectedYear)
                        ->where('pendidikan_terakhir', $selectedVar)
                        ->get()
                        ->groupBy('id_kecamatan')
                        ->map(fn($group) => $group->count())
                        ->values()
                        ->toArray();
                } else {
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
                }
            } else {
                if ($selectedVar !== 'all') {
                    $nameDes = Poverty::join('kecamatan', 'poverties.id_kecamatan', '=', 'kecamatan.id')
                        ->where('status_bantuan', $status)
                        ->where('tahun_input', $selectedYear)
                        ->where('pendidikan_terakhir', $selectedVar)
                        ->distinct('kecamatan.name')
                        ->pluck('kecamatan.name')
                        ->toArray();
        
                    $desValue = Poverty::whereIn('id_kecamatan', $kecIdList)
                        ->where('status_bantuan', $status)
                        ->where('tahun_input', $selectedYear)
                        ->where('pendidikan_terakhir', $selectedVar)
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
            }
        } else {
            if ($selectedVar !== 'all') {
                $nameDes = Poverty::join('desa', 'poverties.id_desa', '=', 'desa.id')
                    ->where('poverties.id_kecamatan', $kecId)
                    ->when($status !== 'all', function ($query) use ($status) {
                        return $query->where('poverties.status_bantuan', $status);
                    })
                    ->where('tahun_input', $selectedYear)
                    ->where('pendidikan_terakhir', $selectedVar)
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
                        ->where('pendidikan_terakhir', $selectedVar)
                        ->count();
                    $desValue[] = $count;
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
        }
        

        $message = [
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
        //  dd($message);

        return response()->json(['message' => $message]);
    }

    public function showMap()
    {
        $geojsonUrl = Storage::url('geojson/dataDesa.json');
        
        return view('map.desa', compact('geojsonUrl'));
    }



}
