@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="container position-relative ">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div for="filter1 " class="text-white text-sm pb-2 text-bold">Tampilkan Berdasarkan:</div>
                        <select class="form-select" id="filter1" onchange="filterByKecamatan()">
                                <option selected value="all">Semua Status</option>
                                <option value="2">Sudah Mendapat Bantuan</option>
                                <option value="1">Belum Mendapat Bantuan</option>
                        </select>
                    </div>
                </div>

                    <input class="form-select d-none" id="filterVar" onchange="filterByKecamatan()" value="all">
                <div class="col-md-4">
                    <div class="form-group">
                        <div for="filter2" class="text-white text-sm pb-2 text-bold">Kecamatan:</div>
                        <select class="form-select" id="filter2" onchange="filterByKecamatan()" @if($userRole === 'Kecamatan') disabled @endif>
                            <option value="kecamatan">Pilih Kecamatan</option>
                                @foreach ($kecLabels as $id => $kecLabel)
                                    <option value="{{ $id }}" @if($userRole === 'Kecamatan' && $id === $loggedInUserKecamatanId) selected @endif>{{ $kecLabel }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                    
                <div class="col-md-4">
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
                </div>
                
            </div>
            <div class="pb-3 text-bold text-white">Dashboard Kemiskinan Berdasarkan Jumlah Penduduk Kabupaten Garut
                Tahun 2022
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-2">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-xs mb-0 text-uppercase font-weight-bold">JUMLAH PENDUDUK</p>
                            @if($userRole === 'Kecamatan')
                                <h5 class="font-weight-bolder" id="jml_penduduk">
                                    {{ number_format($jml_penduduk) }}
                                </h5>
                            @else
                                <h5 class="font-weight-bolder" id="jml_penduduk">
                                    {{ number_format($jml_penduduk) }}
                                </h5>
                            @endif
                            <p class="mb-0">
                                Jiwa
                            </p>
                        </div>
                    </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-xs mb-0 text-uppercase font-weight-bold">JUMLAH KK</p>
                                <h5 class="font-weight-bolder" id="jml_kk">
                                    {{ number_format($jml_kk) }}
                                </h5>
                                <p class="mb-0">
                                    Kepala Keluarga
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="fa fa-user text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-xs mb-0 text-uppercase font-weight-bold">JUMLAH PENDUDUK MISKIN</p>
                                <h5 class="font-weight-bolder" id="jmlPendudukMiskin">
                                    {{ number_format($jml_pen_miskin ?? 0) }}
                                </h5>
                                <p class="mb-0">
                                    Jiwa
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="fa fa-usd text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-xs mb-0 text-uppercase font-weight-bold">PERSENTASE PENDUDUK MISKIN</p>
                                <h5 class="font-weight-bolder" id="persentasePendudukMiskin">
                                    {{ number_format($persentasePendudukMiskin ?? 0, 2) }}
                                </h5>
                                <p class="mb-0">
                                    %
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="fa fa-percent text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card z-index-2">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Perkembangan Persentase Penduduk Miskin</h6>

                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="myChart" class="chart-canvas" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row gap-3 w-100 mt-3">
                <div class="bg-danger rounded-3 p-3 w-100 text-white text-bold">Desil 1
                    <div class="fs-4 text-bold" id="jml_desil1">{{ number_format($jml_desil1 ?? 0) }}</div>
                </div>
                <div class="bg-desil-2 rounded-3 p-3 w-100 text-white text-bold">Desil 2
                     <div class="fs-4 text-bold" id="jml_desil2">{{ number_format($jml_desil2 ?? 0) }}</div>
                </div>
                <div class="bg-desil-3 rounded-3 p-3 w-100 text-white text-bold">Desil 3
                     <div class="fs-4 text-bold" id="jml_desil3">{{ number_format($jml_desil3 ?? 0) }}</div>
                </div>
                <div class="bg-desil-4 rounded-3 p-3 w-100 text-white text-bold">Desil 4
                     <div class="fs-4 text-bold" id="jml_desil4">{{ number_format($jml_desil4 ?? 0) }}</div>
                </div>
            </div>
            <div class="d-flex flex-row gap-3 w-100 mt-3">
                <div class="bg-desil-5 rounded-3 p-3 w-100 text-white text-bold">Desil 5
                    <div class="fs-4 text-bold" id="jml_desil5">{{ number_format($jml_desil5 ?? 0) }}</div>
                </div>
                <div class="bg-desil-6 rounded-3 p-3 w-100 text-white text-bold">Desil 6
                     <div class="fs-4 text-bold" id="jml_desil6">{{ number_format($jml_desil6 ?? 0) }}</div>
                </div>
                <div class="bg-desil-7 rounded-3 p-3 w-100 text-white text-bold">Desil 7
                     <div class="fs-4 text-bold" id="jml_desil7">{{ number_format($jml_desil7 ?? 0) }}</div>
                </div>
                
            </div>
            <div class="card mt-3 p-3">
                <h5>Peta Sebaran</h5>
                <div id="map"></div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card ">
                <div class="chart">
                    <canvas id="horizonChart" class="chart-canvas" height="500"></canvas>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth.footer')
</div>
@endsection

@push('js')
<script>
    var map = L.map('map').setView([-7.2278, 107.9087], 10);
var colors = ['#ffd1d1', '#ffa3a3', '#fc5151', '#ff0000', '#a60202'];
var legend;

// Tambahkan layer peta dari OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Fungsi untuk memperbarui tampilan geojson dengan filter tahun dan variabel
function updateGeojson(year, variable, status, kecamatanSelect) {
    fetch(`/geojson?year=${year}&variable=${variable}&status=${status}&kecamatanSelect=${kecamatanSelect}`)        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            // console.log(data);
            // Menghapus layer geojson yang ada sebelumnya
            if (geojsonLayer) {
                map.removeLayer(geojsonLayer);
            }

            // Mendapatkan semua nilai dari setiap kecamatan
            var allValues = data.features.map(function (feature) {
                return feature.properties.nilai;
            });

            // Menghitung rentang nilai secara dinamis
            var min = Math.min.apply(null, allValues);
            var max = Math.max.apply(null, allValues);
            var rangeSize = Math.ceil((max - min + 1) / 5); // Jumlah rentang diatur menjadi 5

            // Definisikan rentangan nilai dan warna yang sesuai
            var ranges = [];
            for (var i = 0; i < 5; i++) {
                var rangeMin = min + i * rangeSize;
                var rangeMax = rangeMin + rangeSize - 1;
                ranges.push({
                    min: rangeMin,
                    max: rangeMax,
                    color: colors[i % colors.length]
                });
            }

            
            geojsonLayer = L.geoJSON(data, {
                style: function (feature) {
                    // Mendapatkan nilai dari setiap kecamatan
                    var nilai = feature.properties.nilai;

                    // Tentukan warna berdasarkan rentangan nilai
                    var color = 'gray'; // Warna default
                    for (var i = 0; i < ranges.length; i++) {
                        if (nilai >= ranges[i].min && nilai <= ranges[i].max) {
                            color = ranges[i].color;
                            break;
                        }
                    }

                    // Kembalikan style dengan warna yang sesuai
                    return {
                        fillColor: color,
                        color: '#000000',
                        fillOpacity: 1,
                        weight: 1
                    };
                },
                onEachFeature: function (feature, layer) {
                    // Mendapatkan properti dari setiap kecamatan
                    var properties = feature.properties;
                    // console.log(properties.status);
                    // Menampilkan popup saat mouse memasuki area kecamatan
                    layer.on('mouseover', function (e) {
                        
                        var statusMendapat = properties.status === "2" ? 'Sudah mendapat Bantuan' : 'Belum Mendapat Bantuan';
                        var status = properties.status !== null ? statusMendapat : 'Semua Status Bantuan';
                        var tahun = properties.tahun !== null ? properties.tahun : {{$latestYear}};
                        var variabel = properties.variabel !== 'all' ? properties.variabel : 'Semua Variabel';
                        variabel = properties.variabel === null ? 'TIDAK BERSEKOLAH' : variabel;
                        var desa = properties.desa === undefined ? '-' : properties.desa;

                        layer.bindPopup(
                            "<b>Tahun: </b>" + tahun +
                            "<br><b>Status Bantuan: </b>" + status +
                            "<br><b>Desa: </b>" + desa +
                            "<br><b>Kecamatan: </b>" + properties.kecamatan +
                            "<br><b>Kabupaten: </b>" + properties.nmkab +
                            "<br><b>Provinsi: </b>" + properties.nmprov +
                            "<br><b>Nilai: </b>" + properties.nilai
                        ).openPopup();
                    });

                    // Menutup popup saat mouse meninggalkan area kecamatan
                    layer.on('mouseout', function (e) {
                        layer.closePopup();
                    });
                }
            });

            geojsonLayer.addTo(map);

            // Menghapus legenda yang ada sebelumnya
            if (legend) {
                legend.remove();
            }

            // Membuat legenda secara dinamis
            legend = L.control({ position: 'bottomleft' });

            legend.onAdd = function (map) {
                var div = L.DomUtil.create('div', 'legend');
                var labels = [];

                // Menampilkan label untuk setiap rentangan nilai
                for (var i = 0; i < ranges.length; i++) {
                    var range = ranges[i];
                    var color = range.color;

                    labels.push(
                        '<i style="background:' + color + '"></i> ' +
                        range.min + ' - ' + range.max
                    );
                }

                div.innerHTML = labels.join('<br>');
                return div;
            };

            legend.addTo(map);
        })
        .catch(function (error) {
            console.error('Error:', error);
        });
}

// Mendapatkan elemen select untuk filter variabel
var filterVarSelect = document.getElementById('filterVar');
// Mendapatkan elemen select untuk filter tahun
var filterYearSelect = document.getElementById('filter3');

var filterKecamatanSelect = document.getElementById('filter2');

var filterStatusSelect = document.getElementById('filter1');

// Menambahkan event listener saat nilai filter variabel berubah
filterVarSelect.addEventListener('change', function () {
    var selectedVariable = this.value;
    var selectedYear = filterYearSelect.value;
    var selectedStatus = filterStatusSelect.value;
    var selectedKecamatan = filterKecamatanSelect.value;
    updateGeojson(selectedYear, selectedVariable, selectedStatus, selectedKecamatan);
});

// Menambahkan event listener saat nilai filter tahun berubah
filterYearSelect.addEventListener('change', function () {
    var selectedYear = this.value;
    var selectedVariable = filterVarSelect.value;
    var selectedStatus = filterStatusSelect.value;
    var selectedKecamatan = filterKecamatanSelect.value;
    updateGeojson(selectedYear, selectedVariable, selectedStatus, selectedKecamatan);
});

// Menambahkan event listener saat nilai filter tahun berubah
filterStatusSelect.addEventListener('change', function () {
    var selectedYear = filterYearSelect.value;
    var selectedVariable = filterVarSelect.value;
    var selectedStatus = filterStatusSelect.value;
    var selectedKecamatan = filterKecamatanSelect.value;
    updateGeojson(selectedYear, selectedVariable, selectedStatus, selectedKecamatan);
});

filterKecamatanSelect.addEventListener('change', function () {
    var selectedYear = filterYearSelect.value;
    var selectedVariable = filterVarSelect.value;
    var selectedStatus = filterStatusSelect.value;
    var selectedKecamatan = filterKecamatanSelect.value;
    updateGeojson(selectedYear, selectedVariable, selectedStatus, selectedKecamatan);
});

// Memuat geojson awal saat halaman dimuat
var geojsonLayer;
updateGeojson('all', 'all', 'all', 'kecamatan');


</script>

@endpush

@push('js')
<script src="./assets/js/plugins/chartjs.min.js"></script>
<script>
 document.addEventListener('DOMContentLoaded', function () {
    const ctx1 = document.getElementById('myChart').getContext('2d');
    const ctx2 = document.getElementById('horizonChart').getContext('2d');
    let chart1, chart2;
    let labels = <?php echo json_encode($years); ?>;
    // let labels2 = <?php echo json_encode($nameDes); ?>;
    let data1 = <?php echo json_encode($dataCountByYear); ?>;
    // let data2 = <?php echo json_encode($kecValue); ?>;
    let labels2 = <?php echo $labelsJSON; ?>;
    let data2 = <?php echo $dataJSON; ?>;
    // console.log(typeof labels2);
    function createChart1(labels, data) {
        chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '#',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 159, 64, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                hover: {
                    mode: 'index',
                    intersect: false
                },
                animation: {
                    duration: 5000
                }
        }
        });

        return chart1;
    }

    function createChart2(labels, data) {
        chart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '#',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 159, 64, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                hover: {
                    mode: 'index',
                    intersect: false
                },
                animation: {
                    duration: 5000
                }
            },
        });

        return chart2;
    }

    chart1 = createChart1(labels, data1);
    chart2 = createChart2(labels2, data2);

    function filterByKecamatan() {
        const selectElement1 = document.getElementById('filter1');
        const selectedStatus = selectElement1.value;
        const selectElement = document.getElementById('filter2');
        const selectedKecId = selectElement.value;
        const selectedKecLabel = selectElement.options[selectElement.selectedIndex].text;
        const selectedYear = document.getElementById('filter3').value;

        const data = {
            status: selectedStatus,
            kecId: selectedKecId,
            kecLabel: selectedKecId === 'kecamatan' ? 'kecamatan' : selectedKecLabel,
            year: selectedYear
        };

        // Send data using AJAX
        $.ajax({
            url: '{{ route("dashboard.filterKecamatan") }}',
            method: 'GET',
            data: data,
            success: function (response) {
                const message = response.message;
                labels = message.years;
                labels2 = message.nameDes;
                data1 = message.dataCountByYear;
                data2 = message.desValue;
                console.log(labels2);

                chart1.data.labels = labels;
                chart1.data.datasets[0].data = data1;
                chart1.update();

                chart2.data.labels = labels2;
                chart2.data.datasets[0].data = data2;
                chart2.update();

                document.getElementById('jml_penduduk').innerText = message.jml_penduduk;
                document.getElementById('jml_kk').innerText = message.jml_kk;
                document.getElementById('jmlPendudukMiskin').innerText = message.jml_pen_miskin;
                document.getElementById('persentasePendudukMiskin').innerText = message.persentase_penduduk_miskin;
                document.getElementById('jml_desil1').innerText = message.jml_desil1;
                document.getElementById('jml_desil2').innerText = message.jml_desil2;
                document.getElementById('jml_desil3').innerText = message.jml_desil3;
                document.getElementById('jml_desil4').innerText = message.jml_desil4;
                document.getElementById('jml_desil5').innerText = message.jml_desil5;
                document.getElementById('jml_desil6').innerText = message.jml_desil6;
                document.getElementById('jml_desil7').innerText = message.jml_desil7;
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
    
    document.getElementById('filter1').addEventListener('change', filterByKecamatan);
    document.getElementById('filter2').addEventListener('change', filterByKecamatan);
    document.getElementById('filter3').addEventListener('change', filterByKecamatan);
});

</script>

@endpush