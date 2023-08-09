<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Poverty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeoJSONController extends Controller
{
    public function index(Request $request)
{
    $features = [];
    $kecamatanData = Kecamatan::all();
    $selectedYear = $request->input('year');
    $selectedStatus = $request->input('status');
    $selectedVariable = $request->input('variable');
    $latestYear = Poverty::max('tahun_input');
     $userRole = Auth::user()->role;
    //  dd($userRole);

    if ($userRole == "Admin") {
        // Handle case when admin is logged in
        $selectedKecamatan = $request->input('kecamatanSelect');
    } else {
        $userCity = Auth::user()->city; // Assuming 'city' is the field name in the User model
        $kecamatan = Kecamatan::where('name', $userCity)->first();
        // dd($kecamatan);
    
        if ($kecamatan) {
            $selectedKecamatan = $kecamatan->id;
            // dd($selectedKecamatan);
        } else {
            $selectedKecamatan = $request->input('kecamatanSelect');
        }
    }

    if ($selectedKecamatan !== 'kecamatan' ) {
        $namaKecamatan = Kecamatan::where('id', $selectedKecamatan)->pluck('name')->first();
        $namaKecamatan = strtoupper($namaKecamatan);
        $jsonData = file_get_contents(storage_path('app/geojson/dataDesa.json'));
        $geojson = json_decode($jsonData, true);

        if ($selectedYear === 'all') {
            $selectedYear = null;
        }
        if ($selectedStatus === 'all') {
            $selectedStatus = null;
        }
        
        foreach ($geojson['features'] as $feature) {
            if ($feature['properties']['kecamatan'] === $namaKecamatan) {
                $namaDesa = ucfirst(strtolower($feature['properties']['desa']));
                $idDesa = Desa::where('id_kecamatan', $selectedKecamatan)->where('name_desa', $namaDesa)->pluck('id')->first();             
                $query = Poverty::where('id_desa', $idDesa);
                if ($selectedYear === null) {
                    $query->where('tahun_input', $latestYear);
                } else {
                    $query->where('tahun_input', $selectedYear);
                }
    
                // Apply status_bantuan filter
                if ($selectedStatus !== null) {
                    $query->where('status_bantuan', $selectedStatus);
                }
    
                // Add other filters if applicable
                if ($selectedVariable !== 'all') {
                    $query->where('pendidikan_terakhir', $selectedVariable);
                }
                $povertyData = $query->get();
                $jumlahKemiskinan = $povertyData->count();

                //  echo "Jumlah Kemiskinan: " . $idDesa . "</br>";
                $featureData = [
                    'type' => 'Feature',
                    'properties' => [
                        'nmkab' => 'GARUT',
                        'tahun' => $selectedYear,
                        'variabel' => $selectedVariable,
                        'status' => $selectedStatus,
                        'kecamatan' => $namaKecamatan,
                        'nmprov' => 'JAWA BARAT',
                        'desa' => $namaDesa,
                        'nilai' => $jumlahKemiskinan,
                    ],
                    'geometry' => [
                        'type' => $feature['geometry']['type'],
                        'coordinates' => $feature['geometry']['coordinates'],
                    ],
                ];
        
                $features[] = $featureData;
            }
        }
    } else {
        // Handle case when "kecamatan" is selected
        if ($selectedYear === 'all') {
            $selectedYear = null;
        }
        if ($selectedStatus === 'all') {
            $selectedStatus = null;
        }

        foreach ($kecamatanData as $kecamatan) {
            // Use dynamic query based on the selected year
            $query = Poverty::where('id_kecamatan', $kecamatan->id);

            // Apply year filter
            if ($selectedYear === null) {
                $query->where('tahun_input', $latestYear);
            } else {
                $query->where('tahun_input', $selectedYear);
            }

            // Apply status_bantuan filter
            if ($selectedStatus !== null) {
                $query->where('status_bantuan', $selectedStatus);
            }

            // Add other filters if applicable
            if ($selectedVariable !== 'all') {
                $query->where('pendidikan_terakhir', $selectedVariable);
            }

            $povertyData = $query->get();
            //   dd($povertyData);
            

            // Construct feature data
            $feature = [
                'type' => 'Feature',
                'properties' => [
                    'nmkab' => 'GARUT',
                    'tahun' => $selectedYear,
                    'variabel' => $selectedVariable,
                    'status' => $selectedStatus,
                    'kecamatan' => $kecamatan->name,
                    'nmprov' => 'JAWA BARAT',
                    'nilai' => $povertyData->count(),
                ],
                'geometry' => [
                    'type' => $kecamatan->type,
                    'coordinates' => json_decode($kecamatan->coordinates),
                ],
            ];

            $features[] = $feature;
        }
    }
    
    // dd($features);
    $geojson = [
        'type' => 'FeatureCollection',
        'features' => $features,
    ];

    return response()->json($geojson);
}


}

// $feature['properties']['desa'] === $namaDesa &&