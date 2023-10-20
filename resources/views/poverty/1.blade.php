@php
    use Illuminate\Support\Facades\Auth;
@endphp
<div class="col-md-6">
    <div class="form-group">
        <label for="tahun_input">TAHUN INPUT</label>
        <input type="text" name="tahun_input" class="form-control datepicker2" placeholder="Tahun Input" data-date-format="yyyy" value="{{ $poverty->tahun_input ?? '' }}">
        @error('tahun_input') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="id_p3ke">ID Keluarga P3KE</label>
        <input type="number" id="id_p3ke" name="id_p3ke" class="form-control" placeholder="Masukan ID Keluarga P3KE"
            value="{{ $poverty->id_p3ke ?? '' }}">
        @error('id_p3ke') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="id_kemendagri">Kode Kemendagri</label>
        <input type="number" id="id_kemendagri" name="id_kemendagri" class="form-control" placeholder="Masukan Kode Kemendagri"
            value="{{ $poverty->id_p3ke ?? '' }}">
        @error('id_kemendagri') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="id_individu">ID Individu</label>
        <input type="number" id="id_individu" name="id_individu" class="form-control" placeholder="Masukan ID Individu"
            value="{{ $poverty->id_p3ke ?? '' }}">
        @error('id_individu') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="nik">NIK</label>
        <input type="number" id="nik" name="nik" class="form-control" placeholder="Masukan NIK"
            value="{{ $poverty->nik ?? '' }}">
        @error('nik') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="nama">NAMA LENGKAP</label>
        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama Lengkap"
            value="{{ $poverty->nama ?? '' }}">
        @error('nama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
</div>

<div class="col-md-6 form-group">
    <label for="jk">JENIS KELAMIN</label>
    <select name="jk" class="form-select" id="jk">
        <option value="">Pilih Jenis</option>
        <option value="laki" @if(isset($poverty) && $poverty->jk === 'LAKI-LAKI') selected @endif>Laki-Laki</option>
        <option value="perempuan" @if(isset($poverty) && $poverty->jk === 'PEREMPUAN') selected @endif>Perempuan
        </option>
    </select>
    @error('jk') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="tgl">TANGGAL LAHIR</label>
        <input type="text" name="tgl" class="form-control datepicker py-2" placeholder="Masukan Tanggal Lahir"
            data-date-format="dd-mm-yyyy" value="{{ $poverty->tgl ?? '' }}">
        @error('tgl') <p class="text-danger text-xs pt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-8 ">
        <div class="form-group">
            <label for="alamat">ALAMAT </label>
            <textarea id="alamat" name="alamat" class="form-control" rows="5" placeholder="Masukkan Alamat Lengkap"
                >{{ $poverty->alamat ?? '' }}</textarea>
            @error('alamat') <p class="text-danger text-xs pt-1">{{ $message }}</p> @enderror
        </div>
    </div>


    
    <div class="col-md-4 d-flex flex-column">
        <div class="form-group">
            <label for="kecamatan2">Kecamatan</label>
            <select class="form-select" id="kecamatan2" name="id_kecamatan" @if ($userRole === 'Kecamatan') disabled @endif>
                <option selected value="">-- Pilih kecamatan --</option>
                @foreach ($kecamatan as $kec)
                    <option value="{{ $kec->id }}" @if ($selectedKecamatanId == $kec->id) selected @endif>{{ $kec->name }}</option>
                @endforeach
            </select>
            
            @error('id_kecamatan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
        </div>
        
        @if($userRole === 'Kecamatan')
            <input type="hidden" name="id_kecamatan" value="{{ $selectedKecamatanId }}">
        @endif

        @if($selectedDesaId === null)
        <div class="form-group">
            <label for="kelurahan">Desa</label>
            <select name="id_desa" class="form-select" id="kelurahan">
                <option selected value="">-- Pilih Desa --</option>
            </select>
            @error('id_desa') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
        </div>
        @else
        <div class="form-group">
            <label for="kelurahan">Desa edit</label>
            <select name="id_desa" class="form-select" >
                <option selected value="">-- Pilih Desa --</option>
                @foreach ($desa as $des)
                    <option value="{{ $des->id }}" @if ($selectedDesaId == $des->id) selected @endif>{{ $des->name_desa }}</option>
                @endforeach
            </select>
            @error('id_desa') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
        </div>
        @endif
    </div>

<div class="col-md-6">
    <div class="form-group">
        <label for="status_kawin">Status Kawin</label>
        <select name="status_kawin" class="form-select" id="status_kawin">
            <option selected value="">Pilih Status Kawin</option>
            <option value="KAWIN" @if(isset($poverty) && $poverty->status_kawin === 'KAWIN') selected @endif>KAWIN</option>
            <option value="BELUM KAWIN" @if(isset($poverty) && $poverty->status_kawin === 'BELUM KAWIN') selected @endif>BELUM KAWIN</option>
            <option value="CERAI HIDUP" @if(isset($poverty) && $poverty->status_kawin === 'CERAI HIDUP') selected @endif>CERAI HIDUP</option>
            <option value="CERAI MATI" @if(isset($poverty) && $poverty->status_kawin === 'CERAI MATI') selected @endif>CERAI MATI</option>
        </select>
        @error('status_kawin') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
</div>

<div class="col-md-6 form-group">
    <label for="status">STATUS DALAM KELUARGA</label>
    <select name="status" class="form-select" id="status">
        <option selected value="">Pilih Status Keluarga</option>
        <option value="KEPALA KELUARGA" @if(isset($poverty) && $poverty->status === 'KEPALA KELUARGA') selected
            @endif>KEPALA KELUARGA</option>
        <option value="ISTRI" @if(isset($poverty) && $poverty->status === 'ISTRI') selected
            @endif>ISTRI</option>
        <option value="ANAK" @if(isset($poverty) && $poverty->status === 'ANAK') selected
            @endif>ANAK</option>
        <option value="LAINNYA" @if(isset($poverty) && $poverty->status === 'LAINNYA') selected
            @endif>LAINNYA</option>
    </select>
    @error('status') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>

</div>
@push('js')
<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
        });
    });

</script>
<script>
    var kecamatanSelect = document.getElementById('kecamatan2');
    var kelurahanSelect = document.getElementById('kelurahan');
    
    // Menambahkan event listener saat nilai kecamatan berubah
    kecamatanSelect.addEventListener('change', function () {
        kelurahanSelect.innerHTML = '<option selected value="">-- Pilih Desa --</option>';
        
        var selectedKecamatan = kecamatanSelect.value;
        
        if (selectedKecamatan) {
            fetch(`/poverty/getDesa/${selectedKecamatan}`)
                .then(response => response.json())
                .then(data => {
                    // Menambahkan opsi desa berdasarkan data yang diterima
                    data.forEach(desa => {
                        var option = document.createElement('option');
                        option.value = desa.id;
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


@endpush
