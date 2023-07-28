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
        <option value="laki" @if(isset($poverty) && $poverty->jk === 'laki') selected @endif>Laki-Laki</option>
        <option value="perempuan" @if(isset($poverty) && $poverty->jk === 'perempuan') selected @endif>Perempuan
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
            <select class="form-select" id="kecamatan2">
                <option selected value="">-- Pilih kecamatan --</option>
                <input type="hidden" id="kecamatan" name="kecamatan" value="">
                <input type="hidden" id="id_kecamatan" name="id_kecamatan" value="">
            </select>
            @error('id_kecamatan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
        </div>
        <div class="form-group">
            <label for="kelurahan">Desa</label>
            <select name="id_desa" class="form-select" id="kelurahan">
                <option selected value="">-- Pilih Desa --</option>
                <!-- load kelurahan/desa-->
            </select>
            @error('id_desa') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="status_kawin">Status Kawin</label>
        <select name="status_kawin" class="form-select" id="status_kawin">
            <option selected value="">Pilih Usia</option>
            <option value="YA" @if(isset($poverty) && $poverty->status_kawin === 'YA') selected @endif>YA</option>
            <option value="TIDAK" @if(isset($poverty) && $poverty->status_kawin === 'TIDAK') selected @endif>TIDAK</option>
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
        <option value="MENANTU" @if(isset($poverty) && $poverty->status === 'MENANTU') selected
            @endif>MENANTU</option>
        <option value="CUCU" @if(isset($poverty) && $poverty->status === 'CUCU') selected
            @endif>CUCU</option>
        <option value="KEPONAKAN" @if(isset($poverty) && $poverty->status === 'KEPONAKAN') selected
            @endif>KEPONAKAN</option>
        <option value="ORANG TUA" @if(isset($poverty) && $poverty->status === 'ORANG TUA') selected
            @endif>ORANG TUA</option>
        <option value="MERTUA" @if(isset($poverty) && $poverty->status === 'MERTUA') selected
            @endif>MERTUA</option>
    </select>
    @error('status') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
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
@endpush



@push('js')
<script>
    var kecamatanSelect = document.getElementById('kecamatan2');
    var kelurahanSelect = document.getElementById('kelurahan');
    var kecamatanIdInput = document.getElementById('id_kecamatan');
    var kecamatanNameInput = document.getElementById('kecamatan');

    kecamatanSelect.addEventListener('change', function () {
        kelurahanSelect.innerHTML = '<option selected value="">-- Pilih Desa --</option>';

        var selectedKecamatan = kecamatanSelect.value;
        var selectedKecamatanName = kecamatanSelect.options[kecamatanSelect.selectedIndex].text;

        kecamatanIdInput.value = selectedKecamatan;
        kecamatanNameInput.value = selectedKecamatanName;

        if (selectedKecamatan) {
            // Fetch desa berdasarkan kecamatan yang dipilih
            fetch(`/poverty/getDesa/${selectedKecamatan}`)
                .then(response => response.json())
                .then(data => {
                    kelurahanSelect.innerHTML = '<option selected value="">-- Pilih Desa --</option>';

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

    // Mengambil data semua kecamatan dari database
    fetch('/poverty/getKecamatan')
        .then(response => response.json())
        .then(data => {
            kecamatanSelect.innerHTML = '<option selected value="">-- Pilih kecamatan --</option>';

            // Menambahkan opsi kecamatan berdasarkan data yang diterima
            data.data.forEach(kecamatan => {

                var option = document.createElement('option');
                option.value = kecamatan.id;
                option.text = kecamatan.name;
                kecamatanSelect.add(option);
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
</script>
@endpush
