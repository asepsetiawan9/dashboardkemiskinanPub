@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Peta Sebaran Desa'])
<div class="container-fluid py-4">
    <div>
        <div id="map"></div>
    </div>

    @include('layouts.footers.auth.footer')
</div>
@endsection


@push('js')
{{-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> --}}

<script>
    var map = L.map('map').setView([-6.2088, 106.8456], 10);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    }).addTo(map);

    // Muat data GeoJSON dari URL dan tambahkan ke peta
    fetch(@json($geojsonUrl))
        .then(response => response.json())
        .then(geojson => {
            L.geoJSON(geojson, {
                style: {
                    fillColor: 'blue', // Warna isian poligon
                    color: 'black',   // Warna garis batas poligon
                    weight: 1,        // Ketebalan garis batas poligon
                    fillOpacity: 0.5  // Opasitas isian poligon
                }
            }).addTo(map);
        })
        .catch(error => {
            console.error('Error fetching GeoJSON:', error);
        });
</script>


@endpush

