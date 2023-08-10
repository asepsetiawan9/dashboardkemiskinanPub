@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Tambah Data Pengguna'])
<div class="row mt-4 mx-4">
    <div class="position-relative">
        <h5 class="text-white">Tambah Data Pengguna</h5>
        <div class="card px-5 py-3">
            <form action="{{ route('user-management.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">NAMA PENGGUNA</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Nama Pengguna">
                            @error('username') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                            @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">NO. HP</label>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="No Telpon">
                            @error('phone') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                        </div>
                    </div>
                    

                    <div class="col-md-6 form-group">
                        <label for="kecamatan2">Kecamatan</label>
                        <select class="form-select" id="kecamatan2" name="id_kecamatan" @if ($userRole === 'Kecamatan') disabled @endif>
                            <option selected value="">-- Pilih kecamatan --</option>
                            
                            @foreach ($kecamatan as $kec)
                                <option value="{{ $kec->id }}" data-name="{{ $kec->name }}" @if ($selectedKecamatanId == $kec->id) selected @endif>{{ $kec->name }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" id="selectedKecamatanName" name="city" value="{{ $selectedKecamatanName }}">
                    </div>
                    

                    <div class="col-md-6 form-group">
                        <label for="kelurahan">Desa</label>
                        <select name="desa" class="form-select" id="kelurahan">
                            <option selected value="">-- Pilih Desa --</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                            @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="konfirm-pass">Konfirmasi Password</label>
                            <input type="password" name="konfirm-pass" class="form-control" placeholder="Konfirmasi Password" aria-label="Password">
                            @error('konfirm-pass') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <select name="roles[]" id="roles" class="selectRole form-control">
                                @foreach($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 form-group">
                        <label for="jenis">JENIS</label>
                        <select name="role" class="form-select" id="jenis">
                            <option selected value="admin">Administrator</option>
                            <option value="kec">Admin Kecamatan</option>
                            <option value="des">Admin Desa</option>
                        </select>
                        @error('role') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                    </div> --}}
                 </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection

@push('js')
<script>
    var kecamatanSelect = document.getElementById('kecamatan2');
    var kelurahanSelect = document.getElementById('kelurahan');
    var selectedKecamatanNameInput = document.getElementById('selectedKecamatanName');
    
    // Menambahkan event listener saat nilai kecamatan berubah
    kecamatanSelect.addEventListener('change', function () {
        kelurahanSelect.innerHTML = '<option selected value="">-- Pilih Desa --</option>';
        
        var selectedOption = kecamatanSelect.options[kecamatanSelect.selectedIndex];
        var selectedKecamatanId = selectedOption.value;
        var selectedKecamatanName = selectedOption.getAttribute('data-name');
        
        selectedKecamatanNameInput.value = selectedKecamatanName;

        if (selectedKecamatanId) {
            fetch(`/poverty/getDesa/${selectedKecamatanId}`)
                .then(response => response.json())
                .then(data => {
                    // Menambahkan opsi desa berdasarkan data yang diterima
                    data.forEach(desa => {
                        var option = document.createElement('option');
                        option.value = desa.name_desa;
                        option.text = desa.name_desa;
                        kelurahanSelect.add(option);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    });
    
    // Trigger event saat halaman dimuat untuk memilih kecamatan secara otomatis
    var event = new Event('change');
    kecamatanSelect.dispatchEvent(event);
</script>


{{-- <script>
    $(document).ready(function () {
        // Inisialisasi elemen select2
        $('.selectRole').select2();
    });

</script> --}}
@endpush
