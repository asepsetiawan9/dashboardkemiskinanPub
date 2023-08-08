<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Poverty;
use Illuminate\Http\Request;

class GeoJSONController extends Controller
{
    public function index(Request $request)
    {
        $features = [];
        $kecamatanData = Kecamatan::all();
        $selectedYear = $request->input('year');
        $selectedStatus = $request->input('status');
        $selectedVariable = $request->input('variable');
        $selectedKecamatan = $request->input('kecamatanSelect'); // New line
        $latestYear = Poverty::max('tahun_input');
//  dd($selectedKecamatan, $selectedYear);
        // If "all" is selected for year or status, set them to null to remove the filters
        if ($selectedYear === 'all') {
            $selectedYear = null;
        }
        if ($selectedStatus === 'all') {
            $selectedStatus = null;
        }

        foreach ($kecamatanData as $kecamatan) {
            // Check if the selected kecamatan matches the current iteration kecamatan
            // if ($selectedKecamatan !== null && $kecamatan->id !== $selectedKecamatan) {
            //     continue;
            // }

            // Use dynamic query based on the selected year
            $query = Poverty::where('id_kecamatan', $kecamatan->id);

            // Apply year filter
            if ($selectedYear === null) {
                // If year is not selected, use the latest year
                $query->where('tahun_input', $latestYear);
            } else {
                // If year is selected, use the chosen year
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

            // Construct the feature data
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

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => $features,
        ];

        return response()->json($geojson);
    }
}
