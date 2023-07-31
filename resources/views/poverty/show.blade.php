@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => ' Detail Data Kemiskinan'])
<div class="row mt-4 mx-4">
    <div class="position-relative">
        <h5 class="text-white"> Detail Data Kemiskinan</h5>
    </div>
</div>

<div class="container mt-4">
    <div class="card border">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">NIK</strong>
                        <p>{{ $poverty->nik ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">NAMA LENGKAP</strong>
                        <p>{{ $poverty->nama ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">ID P3KE</strong>
                        <p>{{ $poverty->id_p3ke ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">Kode Kemendagri</strong>
                        <p>{{ $poverty->id_kemendagri ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">ID Individu</strong>
                        <p>{{ $poverty->id_individu ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">PADAN DUKCAPIL</strong>
                        <p>{{ $poverty->padan_dukcapil ?: '' }}</p>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">JENIS KELAMIN</strong>
                        <p>{{ $poverty->jk ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">STATUS KAWIN</strong>
                        <p>{{ $poverty->status_kawin ?: '' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="form-group">
                            <strong for="alamat">ALAMAT </strong>
                            <p>{{ $poverty->alamat ?: '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">KECAMATAN</strong>
                        <p>{{ $poverty->kecamatan->name ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">DESA</strong>
                        <p>{{ $poverty->desa->name_desa ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">TANGGAL LAHIR</strong>
                        <p>{{ $poverty->tgl ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">USIA</strong>
                        @if ($poverty->dibawah_7 === "YA")
                            <p>Dibawah 7 Tahun</p>
                        @elseif ($poverty->usia_7_12 === "YA")
                            <p>7 Tahun - 12 Tahun</p>
                        @elseif ($poverty->usia_13_15 === "YA")
                            <p>13 Tahun - 15 Tahun</p>
                        @elseif ($poverty->usia_16_18 === "YA")
                            <p>18 Tahun - 18 Tahun</p>
                        @elseif ($poverty->usia_19_21 === "YA")
                            <p>19 Tahun - 21 Tahun</p>
                        @elseif ($poverty->usia_22_59 === "YA")
                            <p>22 Tahun - 59 Tahun</p>
                        @elseif ($poverty->lebih_60 === "YA")
                            <p>Lebih 60 Tahun</p>
                        @else
                            <p>-</p>
                        @endif
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">HUBUNGAN DENGAN KEPALA KELUARGA</strong>
                        <p>{{ $poverty->status ?: '' }}</p>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">PENDIDIKAN TERAKHIR</strong>
                        <p>{{ $poverty->pendidikan_terakhir ?: '' }}</p>
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">PEKERJAAN</strong>
                        <p>{{ $poverty->jenis_pekerjaan ?: '' }}</p>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="desil">DESIL</strong>
                        <p>{{ $poverty->desil ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="penghasilan_perbulan">PENGHASILAN PERBULAN</strong>
                        <p>Rp. {{ number_format($poverty->penghasilan_perbulan, 0, ',', '.') }}</p>
                    </div>
                </div>    
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">RESIKO STUNTING</strong>
                        <p>{{ $poverty->stunting === 1 ? "YA" : 'TIDAK' }}</p>
                    </div>
                </div>            
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">VERIFIKASI</strong> <br>
                        <p class="btn btn-info">{{ $poverty->verifikasi === "VALID" ? "VALID" : 'TIDAK VALID' }}</p>
                    </div>
                </div>            
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">STATUS BANTUAN</strong> <br>
                        <p class="btn btn-warning">{{ $poverty->status_bantuan === "2" ? "SUDAH MENDAPAT BANTUAN" : 'BELUM MENDAPAT BANTUAN' }}</p>
                    </div>
                </div>            
                
                <!-- Tombol untuk membuka modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assistanceModal">
                    Lihat Bantuan
                </button>

                <!-- Modal -->
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
                                @php
                                // Inisialisasi array untuk menyimpan bantuan yang didapatkan
                                    $bantuanList = [];
                                @endphp
                            
                                @if ($poverty->pkh === "YA")
                                    @php $bantuanList[] = 'PKH'; @endphp
                                @endif
                            
                                @if ($poverty->bpum === "YA")
                                    @php $bantuanList[] = 'BPUM'; @endphp
                                @endif
                            
                                @if ($poverty->bst === "YA")
                                    @php $bantuanList[] = 'BST'; @endphp
                                @endif

                                @if ($poverty->bpnt === "YA")
                                    @php $bantuanList[] = 'BST'; @endphp
                                @endif

                                @if ($poverty->sembako === "YA")
                                    @php $bantuanList[] = 'BST'; @endphp
                                @endif
                            
                                @if (count($bantuanList) > 0)
                                    <div class="row">
                                        @foreach ($bantuanList as $bantuan)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <p>{{ $bantuan }} : YA</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>Tidak ada bantuan yang didapatkan.</p>
                                @endif

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>


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
