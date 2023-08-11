@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Management Data'])
<div class="row mt-4 mx-4">
    <div class="position-relative">
        <h5 class="text-white">Management Data</h5>
    </div>

    <div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Import dan Export Data Kemiskinan</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <a href="{{ route('datamanagement.export') }}" class="btn btn-primary btn-md w-100">EXPORT</a>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#assistanceModal">
                        IMPORT
                    </button>
                   
                </div>
            </div>
            <div class="text-center">
                <p>Anda juga dapat mendownload template Excel untuk mengimpor data:</p>
                <a href="{{ route('datamanagement.downloadTemplate') }}" class="btn btn-secondary btn-sm">Download Template</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="modal fade" id="assistanceModal" tabindex="-1" aria-labelledby="assistanceModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="assistanceModalLabel">Bantuan yang Diterima</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('datamanagement.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="form-group">
                                        <label for="tahun_input">TAHUN INPUT</label>
                                        <select class="form-select" name="tahun">
                                            <option value="" selected>-- Pilih Tahun --</option>
                                            @for ($year = 2020; $year <= 2026; $year++)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    
                                    
                                    <div class="input-group">
                                        <input type="file" name="file" class="form-control">
                                        <button type="submit" class="btn btn-success">Import</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

@endsection

@push('js')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endpush
