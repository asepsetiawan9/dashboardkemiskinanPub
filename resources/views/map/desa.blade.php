@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Map Desa Bantuan'])
<div class="row mt-4 mx-4">
    <div class="row">
        <div class="container position-relative ">
            <div class="row">
                {{-- <div class="col-md-3">
                    <div class="form-group">
                        <div for="filter1 " class="text-white text-sm pb-2 text-bold">Tampilkan Berdasarkan:</div>
                        <select class="form-select" id="filter1" onchange="filterByKecamatan()">
                                <option selected value="all">Semua Status</option>
                                <option value="2">Sudah Mendapat Bantuan</option>
                                <option value="1">Belum Mendapat Bantuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div for="filterVar " class="text-white text-sm pb-2 text-bold">Variabel:</div>
                        <select class="form-select" id="filterVar" onchange="filterByKecamatan()">
                            <option selected value="all">Pilih Variabel</option>
                            @foreach ($variabels as $variabel)
                            <option value="{{ $variabel }}">{{ $variabel === null ? 'TIDAK BERSEKOLAH' : $variabel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
                <div class="col-md-3">
                    <div class="form-group">
                        <div for="filter2" class="text-white text-sm pb-2 text-bold">Kecamatan:</div>
                        <select class="form-select" id="filter2" @if($userRole === 'Kecamatan') disabled @endif>
                            <option value="kecamatan">Pilih Kecamatan</option>
                            @foreach ($kecLabels as $index => $kecLabel)
                                <option value="{{ $kecLabel }}" @if($userRole === 'Kecamatan' && $kecId[$index] === $loggedInUserKecamatanId) selected @endif>{{ $kecLabel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- <div class="col-md-3">
                    <div class="form-group">
                        <div for="filter3" class="text-white text-sm pb-2 text-bold">Tahun:</div>
                        <select class="form-select" id="filter3" onchange="filterByKecamatan()" name="year">
                            @foreach ($years as $year)
                                @if ($year == $latestYear)
                                    <option value="{{ $year }}" selected>{{ $year }}</option>
                                @else
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="position-relative">
        <h5 class="text-white">Data Desa Bantuan</h5>
        <div class="card px-5 py-3">
            <div id="map"></div>
        </div>

    </div>
</div>
@endsection


@push('js')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
    // Fungsi untuk menghasilkan warna berdasarkan jumlah poverty_count
    function getColor(povertyCount) {
        var colors = ['#ffd1d1', '#ffa3a3', '#fc5151', '#ff0000', '#a60202'];
        
        var ranges = [1, 10, 20, 30, 40]; // Ubah rentang sesuai kebutuhan Anda

        for (var i = 0; i < ranges.length; i++) {
            if (povertyCount <= ranges[i]) {
                return colors[i];
            }
        }
        return colors[colors.length - 1]; // Jika lebih dari rentang tertinggi, gunakan warna terakhir
    }

    function loadGeoJSON(selectedKecamatan = null) {
        fetch('{{ route('get-geojson') }}')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(geojson => {
                var map = L.map('map').setView([-7.2278, 107.9087], 10);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19
                }).addTo(map);

                L.geoJSON(geojson, {
                    filter: function (feature) {
                        if (!selectedKecamatan) {
                            return true; // Tampilkan semua kecamatan jika tidak ada yang dipilih
                        }
                        return feature.properties.kecamatan === selectedKecamatan;
                    },
                    style: function (feature) {
                        var povertyCount = feature.properties.poverty_count;
                        var fillColor = getColor(povertyCount);
                        return {
                            fillColor: fillColor,
                            color: 'black',
                            weight: 1,
                            fillOpacity: 0.5
                        };
                    },
                    onEachFeature: function (feature, layer) {
                        var properties = feature.properties;
                        var tahun = properties.tahun !== null ? properties.tahun : 'Tahun Tidak Tersedia';
                        var popupContent =
                            "<b>Tahun: </b>" + tahun +
                            "<br><b>Desa: </b>" + properties.desa +
                            "<br><b>Kecamatan: </b>" + properties.kecamatan +
                            "<br><b>Kabupaten: </b>" + properties.kabkot +
                            "<br><b>Provinsi: </b>" + properties.provinsi +
                            "<br><b>Nilai: </b>" + properties.poverty_count;

                        layer.bindPopup(popupContent);
                    }
                }).addTo(map);
            })
            .catch(error => {
                console.error('Error fetching GeoJSON:', error);
            });
    }

    document.addEventListener('DOMContentLoaded', function () {
        var selectElement = document.getElementById('filter2');
        selectElement.addEventListener('change', function () {
            var selectedKecamatan = selectElement.value;
            loadGeoJSON(selectedKecamatan);
        });
        loadGeoJSON();
    });
</script>




@endpush

