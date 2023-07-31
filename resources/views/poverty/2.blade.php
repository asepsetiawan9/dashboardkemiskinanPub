
<div class="col-md-6 form-group ">
    <label for="pendidikan_terakhir">PENDIDIKAN TERAKHIR</label>
    <select name="pendidikan_terakhir" class="form-select" id="pendidikan_terakhir">
        <option selected value="">Pilih Pendidikan Terakhir</option>
        <option value="MAHASISWA PERGURUAN TINGGI" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'MAHASISWA PERGURUAN TINGGI') selected @endif>MAHASISWA PERGURUAN TINGGI</option>
        <option value="SISWA SD/SEDERAJAT" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'SISWA SD/SEDERAJAT') selected @endif>SISWA SD/SEDERAJAT</option>
        <option value="SISWA SMA/SEDERAJAT" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'SISWA SMA/SEDERAJAT') selected @endif>SISWA SMA/SEDERAJAT</option>
        <option value="SISWA SMP/SEDERAJAT" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'SISWA SMP/SEDERAJAT') selected @endif>SISWA SMP/SEDERAJAT</option>
        <option value="TAMAT PERGURUAN TINGGI" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'TAMAT PERGURUAN TINGGI') selected @endif>TAMAT PERGURUAN TINGGI</option>
        <option value="TAMAT SD/SEDERAJAT" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'TAMAT SD/SEDERAJAT') selected @endif>TAMAT SD/SEDERAJAT</option>
        <option value="TAMAT SMA/SEDERAJAT" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'TAMAT SMA/SEDERAJAT') selected @endif>TAMAT SMA/SEDERAJAT</option>
        <option value="TAMAT SMP/SEDERAJAT" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'TAMAT SMP/SEDERAJAT') selected @endif>TAMAT SMP/SEDERAJAT</option>
        <option value="TIDAK TAMAT SD/SEDERAJAT" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'TIDAK TAMAT SD/SEDERAJAT') selected @endif>TIDAK TAMAT SD/SEDERAJAT</option>
        <option value="TIDAK/BELUM SEKOLAH" @if(isset($poverty) && $poverty->pendidikan_terakhir === 'TIDAK/BELUM SEKOLAH') selected @endif>TIDAK/BELUM SEKOLAH</option>
    </select>
</div>

<div class="col-md-6 form-group">
    <label for="jenis_pekerjaan">PEKERJAAN</label>
    <select name="jenis_pekerjaan" class="form-select" id="jenis_pekerjaan">
        <option selected value="">Pilih Pekerjaan</option>
        <option value="NELAYAN" @if(isset($poverty) && $poverty->jenis_pekerjaan === 'NELAYAN') selected @endif>NELAYAN</option>
        <option value="PEDAGANG" @if(isset($poverty) && $poverty->jenis_pekerjaan === 'PEDAGANG') selected @endif>PEDAGANG</option>
        <option value="PEGAWAI SWASTA" @if(isset($poverty) && $poverty->jenis_pekerjaan === 'PEGAWAI SWASTA') selected @endif>PEGAWAI SWASTA</option>
        <option value="PEKERJA LEPAS" @if(isset($poverty) && $poverty->jenis_pekerjaan === 'PEKERJA LEPAS') selected @endif>PEKERJA LEPAS</option>
        <option value="PENSIUNAN" @if(isset($poverty) && $poverty->jenis_pekerjaan === 'PENSIUNAN') selected @endif>PENSIUNAN</option>
        <option value="TIDAK/BELUM BEKERJA" @if(isset($poverty) && $poverty->jenis_pekerjaan === 'TIDAK/BELUM BEKERJA') selected @endif>TIDAK/BELUM BEKERJA</option>
        <option value="WIRASWASTA" @if(isset($poverty) && $poverty->jenis_pekerjaan === 'WIRASWASTA') selected @endif>WIRASWASTA</option>
        <option value="LAINNYA" @if(isset($poverty) && $poverty->jenis_pekerjaan === 'LAINNYA') selected @endif>LAINNYA</option>
    </select>
</div>

<div class="col-md-6 form-group">
    <label for="desil">DESIL</label>
    <select name="desil" class="form-select" id="desil">
        <option selected value="">Pilih Desil</option>
        <option value="1" @if(isset($poverty) && $poverty->desil === 1) selected @endif>DESIL 1</option>
        <option value="2" @if(isset($poverty) && $poverty->desil === 2) selected @endif>DESIL 2</option>
        <option value="3" @if(isset($poverty) && $poverty->desil === 3) selected @endif>DESIL 3</option>
        <option value="4" @if(isset($poverty) && $poverty->desil === 4) selected @endif>DESIL 4</option>
        <option value="5" @if(isset($poverty) && $poverty->desil === 5) selected @endif>DESIL 5</option>
        <option value="6" @if(isset($poverty) && $poverty->desil === 6) selected @endif>DESIL 6</option>
        <option value="7" @if(isset($poverty) && $poverty->desil === 7) selected @endif>DESIL 7</option>
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
    <label for="verifikasi">VERIVIKASI LAPANGAN</label>
    <select name="verifikasi" class="form-select" id="sembako">
        <option selected value="">Pilih SEMBAKO</option>
        <option value="VALID" @if(isset($poverty) && $poverty->verifikasi === 'VALID') selected @endif>VALID</option>
        <option value="TIDAK VALID" @if(isset($poverty) && $poverty->verifikasi === 'TIDAK VALID') selected @endif>TIDAK VALID</option>
    </select>
    @error('verifikasi') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="penghasilan_perbulan">PENGHASILAN PERBULAN</label>
        <input type="number" id="penghasilan_perbulan" name="penghasilan_perbulan" class="form-control"
            placeholder="Masukan Penghasilan Perbulan" value="{{ $poverty->penghasilan_perbulan ?? '' }}">
        @error('penghasilan_perbulan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
</div>

<div class="row col-md-12">
    <div class="col-md-3 form-group">
        <label for="dibawah_7">USIA DIBAWAH 7 TAHUN</label>
        <select name="dibawah_7" class="form-select" id="dibawah_7">
            <option selected value="">Pilih Usia</option>
            <option value="YA" @if(isset($poverty) && $poverty->dibawah_7 === 'YA') selected @endif>YA</option>
            <option value="TIDAK" @if(isset($poverty) && $poverty->dibawah_7 === 'TIDAK') selected @endif>TIDAK</option>
        </select>
        @error('dibawah_7') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
    <div class="col-md-3 form-group">
        <label for="usia_7_12">USIA 7 - 12 Tahun</label>
        <select name="usia_7_12" class="form-select" id="usia_7_12">
            <option selected value="">Pilih Usia</option>
            <option value="YA" @if(isset($poverty) && $poverty->usia_7_12 === 'YA') selected @endif>YA</option>
            <option value="TIDAK" @if(isset($poverty) && $poverty->usia_7_12 === 'TIDAK') selected @endif>TIDAK</option>
        </select>
        @error('usia_7_12') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
    <div class="col-md-3 form-group">
        <label for="usia_13_15">USIA 13 - 15 Tahun</label>
        <select name="usia_13_15" class="form-select" id="usia_13_15">
            <option selected value="">Pilih Usia</option>
            <option value="YA" @if(isset($poverty) && $poverty->usia_13_15 === 'YA') selected @endif>YA</option>
            <option value="TIDAK" @if(isset($poverty) && $poverty->usia_13_15 === 'TIDAK') selected @endif>TIDAK</option>
        </select>
        @error('usia_13_15') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
    <div class="col-md-3 form-group">
        <label for="usia_16_18">USIA 16 - 18 Tahun</label>
        <select name="usia_16_18" class="form-select" id="usia_16-18">
            <option selected value="">Pilih Usia</option>
            <option value="YA" @if(isset($poverty) && $poverty->usia_16_18 === 'YA') selected @endif>YA</option>
            <option value="TIDAK" @if(isset($poverty) && $poverty->usia_16_18 === 'TIDAK') selected @endif>TIDAK</option>
        </select>
        @error('usia_16_18') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
    <div class="col-md-3 form-group">
        <label for="usia_19_21">USIA 19 - 21 Tahun</label>
        <select name="usia_19_21" class="form-select" id="usia_19_21">
            <option selected value="">Pilih Usia</option>
            <option value="YA" @if(isset($poverty) && $poverty->usia_19_21 === 'YA') selected @endif>YA</option>
            <option value="TIDAK" @if(isset($poverty) && $poverty->usia_19_21 === 'TIDAK') selected @endif>TIDAK</option>
        </select>
        @error('usia_19_21') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
    <div class="col-md-3 form-group">
        <label for="usia_22_59">USIA 22 - 59 Tahun</label>
        <select name="usia_22_59" class="form-select" id="usia_22_59">
            <option selected value="">Pilih Usia</option>
            <option value="YA" @if(isset($poverty) && $poverty->usia_22_59 === 'YA') selected @endif>YA</option>
            <option value="TIDAK" @if(isset($poverty) && $poverty->usia_22_59 === 'TIDAK') selected @endif>TIDAK</option>
        </select>
        @error('usia_22_59') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
    </div>
    <div class="col-md-3 form-group">
        <label for="lebih_60">USIA Lebih 60 Tahun</label>
        <select name="lebih_60" class="form-select" id="lebih_60">
            <option selected value="">Pilih Usia</option>
            <option value="YA" @if(isset($poverty) && $poverty->lebih_60 === 'YA') selected @endif>YA</option>
            <option value="TIDAK" @if(isset($poverty) && $poverty->lebih_60 === 'TIDAK') selected @endif>TIDAK</option>
        </select>
        @error('lebih_60') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
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