{{-- 
<div class="col-md-6 d-none">
    <div class="form-group">
        <label for="kk">NO KK</label>
        <input type="text" id="kk" name="kk" class="form-control" placeholder="Masukan No KK"
            value="{{ $poverty->kk ?? '' }}">
        @error('kk') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
</div>
<div class="col-md-4 d-flex flex-column d-none">
    <div class="form-group">
        <label for="rt">RT</label>
        <input type="text" id="rt" name="rt" class="form-control" placeholder="Masukkan RT"
            value="{{ $poverty->rt ?? '' }}">
        @error('rt') <p class="text-danger text-xs pt-1">{{ $message }}</p> @enderror
    </div>
    <div class="form-group">
        <label for="rw">RW</label>
        <input type="text" id="rw" name="rw" class="form-control" placeholder="Masukkan RW"
            value="{{ $poverty->rw ?? '' }}">
        @error('rw') <p class="text-danger text-xs pt-1">{{ $message }}</p> @enderror
    </div>
</div>
</div>


<div class="col-md-6 d-none">
<div class="form-group">
    <label for="tempat_lahir">TEMPAT LAHIR</label>
    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Masukan Tempat Lahir"
        value="{{ $poverty->tempat_lahir ?? '' }}">
    @error('tempat_lahir') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>
</div>

<div class="row d-none">
    <div class="col-md-4">
        <div class="form-group">
            <label for="foto_diri">FOTO WAJAH</label><br>
            <input type="file" name="foto_diri" class="form-control-file" id="uploadFoto" accept=".jpg, .jpeg, .png"
                onchange="validateUpload(this)" value="{{ $poverty->foto_diri ?? '' }}">
            <small class="text-muted">Ukuran maksimum: 2MB</small>
        </div>
    </div>
    <div class="col-md-3">
        <div id="previewFoto"
            class="text-center border-dashed h-100 fs-6 d-flex align-items-center justify-content-center">
            <i class="fa fa-user-circle-o" aria-hidden="true" style="font-size: 64px;"></i>
        </div>
    </div>
    <div class="col-md-5">
    </div>
</div> --}}
{{-- <div class="col-md-12 d-none">
    <div class="form-group">
        <label for="bantuan_diterima">BANTUAN YANG DITERIMA </label>
        <textarea id="bantuan_diterima" name="bantuan_diterima" class="form-control" rows="5"
            placeholder="Masukkan Bantuan Yang Diterima" >{{ $poverty->bantuan_diterima ?? '' }}</textarea>
        @error('bantuan_diterima') <p class="text-danger text-xs pt-1">{{ $message }}</p> @enderror
    </div>
</div>
<div class="col-md-6 form-group d-none">
    <label for="status_pendidikan">STATUS PENDIDIKAN</label>
    <select name="status_pendidikan" class="form-select" id="status_pendidikan" onchange="togglePendidikanTerakhir()">
        <option selected value="">Pilih Status Pendidikan</option>
        <option value="BERSEKOLAH" @if(isset($poverty) && $poverty->status_pendidikan === 'BERSEKOLAH') selected @endif>BERSEKOLAH</option>
        <option value="TIDAK BERSEKOLAH" @if(isset($poverty) && $poverty->status_pendidikan === 'TIDAK BERSEKOLAH') selected @endif>TIDAK BERSEKOLAH</option>
    </select>
    @error('status_pendidikan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>

<div class="col-md-6 form-group d-none">
    <label for="pekerjaan">STATUS PEKERJAAN</label>
    <select name="pekerjaan" class="form-select" id="pekerjaan"
    onchange="toggleJenisPekerjaan()">
        <option selected value="">Pilih Status Pekerjaan</option>
        <option value="BEKERJA" @if(isset($poverty) && $poverty->pekerjaan === 'BEKERJA')
            selected
            @endif>BEKERJA</option>
        <option value="TIDAK/BELUM BEKERJA" @if(isset($poverty) && $poverty->pekerjaan === 'TIDAK/BELUM BEKERJA')
            selected
            @endif>TIDAK/BELUM BEKERJA</option>
    </select>
    @error('pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>
<div class="col-md-6 form-group d-none">
    <label for="tempat_tinggal">BANGUNAN TEMPAT TINGGAL</label>
    <select name="tempat_tinggal" class="form-select" id="tempat_tinggal">
        <option selected value="">Pilih Bangunan Tempat Tinggal</option>
        <option value="MILIK SENDIRI" @if(isset($poverty) && $poverty->tempat_tinggal === 'MILIK SENDIRI') selected @endif>MILIK SENDIRI</option>
        <option value="KONTRAK/SEWA" @if(isset($poverty) && $poverty->tempat_tinggal === 'KONTRAK/SEWA') selected @endif>KONTRAK/SEWA</option>
        <option value="BEBAS SEWA" @if(isset($poverty) && $poverty->tempat_tinggal === 'BEBAS SEWA') selected @endif>BEBAS SEWA</option>
        <option value="BANGUNAN TEMPAT TINGGAL LAINNYA" @if(isset($poverty) && $poverty->tempat_tinggal === 'BANGUNAN TEMPAT TINGGAL LAINNYA') selected @endif>BANGUNAN TEMPAT TINGGAL LAINNYA</option>
    </select>
    @error('tempat_tinggal') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>

<div class="col-md-6 form-group d-none">
    <label for="sumber_air_minum">SUMBER AIR MINUM</label>
    <select name="sumber_air_minum" class="form-select" id="sumber_air_minum">
        <option selected value="">Pilih Sumber Air Minum</option>
        <option value="AIR KEMASAN/ISI ULANGLEDENG/PAM" @if(isset($poverty) && $poverty->sumber_air_minum === 'AIR KEMASAN/ISI ULANGLEDENG/PAM') selected @endif>AIR KEMASAN/ISI ULANGLEDENG/PAM</option>
        <option value="TERLINDUNG" @if(isset($poverty) && $poverty->sumber_air_minum === 'TERLINDUNG') selected @endif>TERLINDUNG</option>
        <option value="TIDAK TERLINDUNG" @if(isset($poverty) && $poverty->sumber_air_minum === 'TIDAK TERLINDUNG') selected @endif>TIDAK TERLINDUNG</option>
        <option value="MINUM UTAMA LAINNYA" @if(isset($poverty) && $poverty->sumber_air_minum === 'MINUM UTAMA LAINNYA') selected @endif>MINUM UTAMA LAINNYA</option>
    </select>
    @error('sumber_air_minum') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>

<div class="col-md-6 form-group d-none">
    <label for="sumber_penerangan_utama">SUMBER PENERANGAN UTAMA</label>
    <select name="sumber_penerangan_utama" class="form-select" id="sumber_penerangan_utama">
        <option selected value="">Pilih Sumber Penerangan</option>
        <option value="LISTRIK PLN" @if(isset($poverty) && $poverty->sumber_penerangan_utama === 'LISTRIK PLN') selected @endif>LISTRIK PLN</option>
        <option value="LISTRIK NON PLN" @if(isset($poverty) && $poverty->sumber_penerangan_utama === 'LISTRIK NON PLN') selected @endif>LISTRIK NON PLN</option>
        <option value="NON-LISTRIK" @if(isset($poverty) && $poverty->sumber_penerangan_utama === 'NON-LISTRIK') selected @endif>NON-LISTRIK</option>
        <option value="LAINNYA" @if(isset($poverty) && $poverty->sumber_penerangan_utama === 'LAINNYA') selected @endif>LAINNYA</option>
    </select>
    @error('sumber_penerangan_utama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>
<div class="col-md-6 form-group d-none">
    <label for="bahan_bakar_memasak">BAHAN BAKAR MEMASAK</label>
    <select name="bahan_bakar_memasak" class="form-select" id="bahan_bakar_memasak">
        <option selected value="">Pilih Bahan Bakar</option>
        <option value="LISTRIK/GAS" @if(isset($poverty) && $poverty->bahan_bakar_memasak === 'LISTRIK/GAS') selected @endif>LISTRIK/GAS</option>
        <option value="MINYAK TANAH" @if(isset($poverty) && $poverty->bahan_bakar_memasak === 'MINYAK TANAH') selected @endif>MINYAK TANAH</option>
        <option value="ARANG KAYU" @if(isset($poverty) && $poverty->bahan_bakar_memasak === 'ARANG KAYU') selected @endif>ARANG KAYU</option>
        <option value="LAINNYA" @if(isset($poverty) && $poverty->bahan_bakar_memasak === 'LAINNYA') selected @endif>LAINNYA</option>
    </select>
    @error('bahan_bakar_memasak') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>
<div class="col-md-6 form-group d-none">
    <label for="bab">FASILITAS BAB</label>
    <select name="bab" class="form-select" id="bab">
        <option selected value="">Pilih Fasilitas BAB</option>
        <option value="ADA DENGAN SEPTIK TANK" @if(isset($poverty) && $poverty->bab === 'ADA DENGAN SEPTIK TANK') selected @endif>ADA DENGAN SEPTIK TANK</option>
        <option value="ADA TANPA SEPTIK TANK" @if(isset($poverty) && $poverty->bab === 'ADA TANPA SEPTIK TANK') selected @endif>ADA TANPA SEPTIK TANK</option>
        <option value="JAMBAN UMUM/BERSAMA" @if(isset($poverty) && $poverty->bab === 'JAMBAN UMUM/BERSAMA') selected @endif>JAMBAN UMUM/BERSAMA</option>
        <option value="LAINNYA" @if(isset($poverty) && $poverty->bab === 'LAINNYA') selected @endif>LAINNYA</option>
    </select>
    @error('bab') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>

<div class="row d-none">
    <div class="col-md-4">
        <div class="form-group">
            <label for="foto_rumah">FOTO RUMAH</label><br>
            <input type="file" name="foto_rumah" class="form-control-file" id="uploadFoto2" accept=".jpg, .jpeg, .png"
                onchange="validateUpload2(this)" value="{{ $poverty->foto_rumah ?? '' }}">
            <small class="text-muted">Ukuran maksimum: 2MB</small>
        </div>
    </div>
    <div class="col-md-3">
        <div id="previewFoto2"
            class="text-center border-dashed h-100 fs-6 d-flex align-items-center justify-content-center">
            <i class="fa fa-home" aria-hidden="true" style="font-size: 64px;"></i>
        </div>
    </div>
    <div class="col-md-5">
    </div>
</div> --}}
<div class="col-md-6 form-group d-none">
    <label for="pekerjaan">STATUS PEKERJAAN</label>
    <select name="pekerjaan" class="form-select" id="pekerjaan"
>
        <option selected value="">Pilih Status Pekerjaan</option>
        <option value="BEKERJA" @if(isset($poverty) && $poverty->pekerjaan === 'BEKERJA')
            selected
            @endif>BEKERJA</option>
        <option value="TIDAK/BELUM BEKERJA" @if(isset($poverty) && $poverty->pekerjaan === 'TIDAK/BELUM BEKERJA')
            selected
            @endif>TIDAK/BELUM BEKERJA</option>
    </select>
    @error('pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
     function validateUpload(input) {
        if (input.files && input.files[0]) {
            var file = input.files[0];
            var fileSize = file.size / 1024 / 1024; // Size in MB
            var validExtensions = ['jpg', 'jpeg', 'png'];
            var fileExtension = file.name.split('.').pop().toLowerCase();

            if (fileSize > 2) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ukuran file terlalu besar. Mohon pilih file dengan ukuran maksimum 2MB.'
                });
                input.value = ''; // Reset the input file
            } else if (!validExtensions.includes(fileExtension)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Format file tidak valid. Mohon pilih file dengan format JPG, JPEG, atau PNG.'
                });
                input.value = ''; // Reset the input file
            } else {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewFoto').html('<img src="' + e.target.result +
                        '" class="img-thumbnail" style="max-width: 200px;">');
                };
                reader.readAsDataURL(file);
            }
        }
    }

    function validateUpload2(input) {
        if (input.files && input.files[0]) {
            var file = input.files[0];
            var fileSize = file.size / 1024 / 1024; // Size in MB
            var validExtensions = ['jpg', 'jpeg', 'png'];
            var fileExtension = file.name.split('.').pop().toLowerCase();

            if (fileSize > 2) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ukuran file terlalu besar. Mohon pilih file dengan ukuran maksimum 2MB.'
                });
                input.value = ''; // Reset the input file
            } else if (!validExtensions.includes(fileExtension)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Format file tidak valid. Mohon pilih file dengan format JPG, JPEG, atau PNG.'
                });
                input.value = ''; // Reset the input file
            } else {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewFoto2').html('<img src="' + e.target.result +
                        '" class="img-thumbnail" style="max-width: 200px;">');
                };
                reader.readAsDataURL(file);
            }
        }
    }

    $(document).ready(function () {
        // Ambil nilai foto_diri dari data yang sedang diedit
        var fotoDiri = '{{ $poverty->foto_diri ?? '' }}';

        if (fotoDiri) {
            // Tampilkan foto yang telah diunggah
            var fotoUrl = '{{ asset("storage/foto_diri") }}/' + fotoDiri;
            $('#previewFoto').html('<img src="' + fotoUrl +
                '" class="img-thumbnail" style="max-width: 200px;">');
        } else {
            // Tampilkan placeholder atau ikon default
            $('#previewFoto').html(
                '<i class="fa fa-user-circle-o" aria-hidden="true" style="font-size: 64px;"></i>');
        }

        // Ambil nilai foto_rumah dari data yang sedang diedit
        var fotoRumah = '{{ $poverty->foto_rumah ?? '' }}';

        if (fotoRumah) {
            // Tampilkan foto yang telah diunggah
            var fotoUrl2 = '{{ asset("storage/foto_rumah") }}/' + fotoRumah;
            $('#previewFoto2').html('<img src="' + fotoUrl2 +
                '" class="img-thumbnail" style="max-width: 200px;">');
        } else {
            // Tampilkan placeholder atau ikon default
            $('#previewFoto2').html(
                '<i class="fa fa-home" aria-hidden="true" style="font-size: 64px;"></i>');
        }
    });

</script>
@endpush


@push('css')
<style>
    .border-dashed {
        border: 0.5px dashed #ccc;
        padding: 5px;
    }

</style>
@endpush
@push('js')
<script>
    window.onload = function() {
        togglePendidikanTerakhir();
    };

    function togglePendidikanTerakhir() {
        var statusPendidikan = document.getElementById('status_pendidikan').value;
        var pendidikanTerakhirSelect = document.getElementById('pendidikan_terakhir');

        if (statusPendidikan === 'TIDAK BERSEKOLAH') {
            pendidikanTerakhirSelect.disabled = true;
            pendidikanTerakhirSelect.value = '';
        } else {
            pendidikanTerakhirSelect.disabled = false;
        }
    }
    function toggleJenisPekerjaan() {
        var statusPekerjaan = document.getElementById('pekerjaan').value;
        var jenisPekerjaanSelect = document.getElementById('jenis_pekerjaan');

        if (statusPekerjaan === 'TIDAK/BELUM BEKERJA') {
            jenisPekerjaanSelect.disabled = true;
            jenisPekerjaanSelect.value = '';
        } else {
            jenisPekerjaanSelect.disabled = false;
        }
    }
</script>
@endpush
