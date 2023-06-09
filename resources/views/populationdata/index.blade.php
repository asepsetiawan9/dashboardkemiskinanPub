@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Data Penduduk'])
<div class="row mt-4 mx-4">
    <div class="position-relative">
        <h5 class="text-white">Data Penduduk</h5>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4 d-flex justify-content-end">
                <a href="{{ route('population-data.create') }}" class="mt-4"> <button class="btn btn-success">Tambah
                        Data Penduduk</button></a>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Data Penduduk</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">JUMLAH
                                    PENDUDUK</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    JUMLAH KK</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">JUMLAH
                                    LAKI-LAKI</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">JUMLAH
                                    PEREMPUAN</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TAHUN
                                </th>
                                <th
                                    class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                    AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="users-table">
                            @if ($populations->isEmpty())
                            <tr>
                                <td class="text-center" colspan="6">Data tidak ada.</td>
                            </tr>
                            @else
                                @include('populationdata.partial_table')
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $populations->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
