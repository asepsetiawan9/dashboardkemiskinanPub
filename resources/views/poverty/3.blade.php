<div class="col-md-6 form-group">
    <label for="dtks">PENERIMA DTKS ?</label>
    <select name="dtks" class="form-select" id="dtks">
        <option selected value="">Pilih DTKS</option>
        <option value="YA" @if(isset($poverty) && $poverty->dtks === 'YA') selected @endif>YA</option>
        <option value="TIDAK" @if(isset($poverty) && $poverty->dtks === 'TIDAK') selected @endif>TIDAK</option>
    </select>
    @error('dtks') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>
<div class="col-md-6 form-group">
    <label for="bpnt">PENERIMA BPNT ?</label>
    <select name="bpnt" class="form-select" id="bpnt">
        <option selected value="">Pilih BPNT</option>
        <option value="YA" @if(isset($poverty) && $poverty->bpnt === 'YA') selected @endif>YA</option>
        <option value="TIDAK" @if(isset($poverty) && $poverty->bpnt === 'TIDAK') selected @endif>TIDAK</option>
    </select>
    @error('bpnt') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>
<div class="col-md-6 form-group">
    <label for="bpum">PENERIMA BPUM ?</label>
    <select name="bpum" class="form-select" id="bpum">
        <option selected value="">Pilih BPUM</option>
        <option value="YA" @if(isset($poverty) && $poverty->bpum === 'YA') selected @endif>YA</option>
        <option value="TIDAK" @if(isset($poverty) && $poverty->bpum === 'TIDAK') selected @endif>TIDAK</option>
    </select>
    @error('bpum') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>
<div class="col-md-6 form-group">
    <label for="bst">PENERIMA BST ?</label>
    <select name="bst" class="form-select" id="bst">
        <option selected value="">Pilih BST</option>
        <option value="YA" @if(isset($poverty) && $poverty->bst === 'YA') selected @endif>YA</option>
        <option value="TIDAK" @if(isset($poverty) && $poverty->bst === 'TIDAK') selected @endif>TIDAK</option>
    </select>
    @error('bst') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>
<div class="col-md-6 form-group">
    <label for="pkh">PENERIMA PKH ?</label>
    <select name="pkh" class="form-select" id="pkh">
        <option selected value="">Pilih PKH</option>
        <option value="YA" @if(isset($poverty) && $poverty->pkh === 'YA') selected @endif>YA</option>
        <option value="TIDAK" @if(isset($poverty) && $poverty->pkh === 'TIDAK') selected @endif>TIDAK</option>
    </select>
    @error('pkh') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>
<div class="col-md-6 form-group">
    <label for="sembako">PENERIMA SEMBAKO ?</label>
    <select name="sembako" class="form-select" id="sembako">
        <option selected value="">Pilih SEMBAKO</option>
        <option value="YA" @if(isset($poverty) && $poverty->sembako === 'YA') selected @endif>YA</option>
        <option value="TIDAK" @if(isset($poverty) && $poverty->sembako === 'TIDAK') selected @endif>TIDAK</option>
    </select>
    @error('sembako') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
</div>
<div class="col-md-6 form-group">
    <label for="stunting"> RESIKO STUNTING ?</label>
    <select name="stunting" class="form-select" id="stunting">
        <option selected value="">Pilih Stunting</option>
        <option value="YA" @if(isset($poverty) && $poverty->sembako === 'YA') selected @endif>YA</option>
        <option value="TIDAK" @if(isset($poverty) && $poverty->sembako === 'TIDAK') selected @endif>TIDAK</option>
    </select>
    @error('stunting') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
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
