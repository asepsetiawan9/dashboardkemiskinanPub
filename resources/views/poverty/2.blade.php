<div class="col-md-6 form-group d-none">
    <label for="status_pendidikan">STATUS PENDIDIKAN</label>
    <select name="status_pendidikan" class="form-select" id="status_pendidikan" onchange="togglePendidikanTerakhir()">
        <option selected value="">Pilih Status Pendidikan</option>
        <option value="BERSEKOLAH" @if(isset($poverty) && $poverty->status_pendidikan === 'BERSEKOLAH') selected @endif>BERSEKOLAH</option>
        <option value="TIDAK BERSEKOLAH" @if(isset($poverty) && $poverty->status_pendidikan === 'TIDAK BERSEKOLAH') selected @endif>TIDAK BERSEKOLAH</option>
    </select>
    @error('status_pendidikan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>

<div class="col-md-6 form-group ">
    <label for="pendidikan_terakhir">PENDIDIKAN TERAKHIR</label>
    <select name="pendidikan_terakhir" class="form-select" id="pendidikan_terakhir" @if(isset($poverty) && $poverty->status_pendidikan === 'TIDAK BERSEKOLAH') disabled @endif>
        <option selected value="">Pilih Pendidikan Terakhir</option>
        <option value="TAMAT SD / SEDERAJAT" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'TAMAT SD / SEDERAJAT') selected @endif>TAMAT SD / SEDERAJAT</option>
        <option value="SLTP / SEDERAJAT" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'SLTP / SEDERAJAT') selected @endif>SLTP / SEDERAJAT</option>
        <option value="SLTA/SEDERAJAT" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'LTA/SEDERAJAT') selected @endif>SLTA/SEDERAJAT</option>
        <option value="DIPLOMA IV/ STRATA I" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'DIPLOMA IV/ STRATA I') selected @endif>DIPLOMA IV/ STRATA I</option>
        <option value="DIPLOMA I / II" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'DIPLOMA I / II') selected @endif>DIPLOMA I / II</option>
        <option value="AKADEMI/ DIPLOMA III/S. MUDA" @if(isset($poverty) && $poverty->status_pendidikan === 'AKADEMI/ DIPLOMA III/S. MUDA') selected @endif>AKADEMI/ DIPLOMA III/S. MUDA</option>
        <option value="STRATA II" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'STRATA II') selected @endif>STRATA II</option>
        <option value="STRATA III" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'STRATA III') selected @endif>STRATA III</option>
    </select>
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
<div class="col-md-6 form-group">
    <label for="jenis_pekerjaan">JENIS PEKERJAAN</label>
    <input type="text" id="jenis_pekerjaan" name="jenis_pekerjaan" class="form-control" placeholder="Masukan Jenis Pekerjaan"
            value="{{ $poverty->jenis_pekerjaan ?? '' }}">
        @error('jenis_pekerjaan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    {{-- <select name="jenis_pekerjaan" class="form-select" id="jenis_pekerjaan">
        <option selected value="">Pilih Status Pekerjaan</option>
        <option value="PETANI" @if(isset($poverty) && $poverty->jenis_pekerjaan === 'PETANI') selected @endif>PETANI</option>
        <option value="NELAYAN" @if(isset($poverty) && $poverty->jenis_pekerjaan === 'NELAYAN') selected @endif>NELAYAN</option>
        <option value="PEDAGANG" @if(isset($poverty) && $poverty->jenis_pekerjaan === 'PEDAGANG') selected @endif>PEDAGANG</option>
        <option value="PEGAWAI SWASTA" @if(isset($poverty) && $poverty->jenis_pekerjaan === 'PEGAWAI SWASTA') selected @endif>PEGAWAI SWASTA</option>
        <option value="WIRASWASTA" @if(isset($poverty) && $poverty->jenis_pekerjaan === 'WIRASWASTA') selected @endif>WIRASWASTA</option>
        <option value="PENSIUNAN" @if(isset($poverty) && $poverty->jenis_pekerjaan === 'PENSIUNAN') selected @endif>PENSIUNAN</option>
        <option value="PEKERJA LEPAS" @if(isset($poverty) && $poverty->jenis_pekerjaan === 'PEKERJA LEPAS') selected @endif>PEKERJA LEPAS</option>
        <option value="LAINNYA" @if(isset($poverty) && $poverty->jenis_pekerjaan === 'LAINNYA') selected @endif>LAINNYA</option>
    </select> --}}

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
</div>

<div class="col-md-6 form-group">
    <label for="desil">DESIL</label>
    <select name="desil" class="form-select" id="desil">
        <option selected value="">Pilih Desil</option>
        <option value="1" @if(isset($poverty) && $poverty->desil === '1') selected @endif>DESIL 1</option>
        <option value="2" @if(isset($poverty) && $poverty->desil === '2') selected @endif>DESIL 2</option>
        <option value="3" @if(isset($poverty) && $poverty->desil === '3') selected @endif>DESIL 3</option>
        <option value="4" @if(isset($poverty) && $poverty->desil === '4') selected @endif>DESIL 4</option>
    </select>
    @error('desil') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>

<div class="col-md-6 form-group">
    <label for="padan_dukcapil">PADAN DUKCAPIL</label>
    <select name="padan_dukcapil" class="form-select" id="padan_dukcapil">
        <option selected value="">Pilih Padan Dukcapil</option>
        <option value="YA" @if(isset($poverty) && $poverty->padan_dukcapil === 'YA') selected @endif>YA</option>
        <option value="TIDAK" @if(isset($poverty) && $poverty->padan_dukcapil === 'TIDAK') selected @endif>TIDAK</option>
    </select>
    @error('padan_dukcapil') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>

<div class="col-md-6 form-group">
    <label for="verif">VERIVIKASI LAPANGAN</label>
    <select name="verif" class="form-select" id="sembako">
        <option selected value="">Pilih SEMBAKO</option>
        <option value="VALID" @if(isset($poverty) && $poverty->verif === 'VALID') selected @endif>VALID</option>
        <option value="TIDAK VALID" @if(isset($poverty) && $poverty->verif === 'TIDAK VALID') selected @endif>TIDAK VALID</option>
    </select>
    @error('pkh') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="penghasilan_perbulan">PENGHASILAN PERBULAN</label>
        <input type="number" id="penghasilan_perbulan" name="penghasilan_perbulan" class="form-control"
            placeholder="Masukan Penghasilan Perbulan" value="{{ $poverty->penghasilan_perbulan ?? '' }}">
        @error('penghasilan_perbulan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
</div>

<div class="col-md-12 d-none">
    <div class="form-group">
        <label for="bantuan_diterima">BANTUAN YANG DITERIMA </label>
        <textarea id="bantuan_diterima" name="bantuan_diterima" class="form-control" rows="5"
            placeholder="Masukkan Bantuan Yang Diterima" >{{ $poverty->bantuan_diterima ?? '' }}</textarea>
        @error('bantuan_diterima') <p class="text-danger text-xs pt-1">{{ $message }}</p> @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="tahun_input">TAHUN INPUT</label>
        <input type="text" name="tahun_input" class="form-control datepicker2" placeholder="Tahun Input" data-date-format="yyyy" value="{{ $poverty->tahun_input ?? '' }}">
        @error('tahun_input') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
</div>
@push('js')
<script>
    $(document).ready(function () {
        $('.datepicker2').datepicker({
            format: 'yyyy',
            startView: 'years',
            minViewMode: 'years',
            autoclose: true
        });
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
