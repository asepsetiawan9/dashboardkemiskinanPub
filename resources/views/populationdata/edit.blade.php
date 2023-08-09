@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Ubah Data Pengguna'])
<div class="row mt-4 mx-4">
    <div class="position-relative">
        <h5 class="text-white">Ubah Data Pengguna</h5>
        <div class="card px-5 py-3">
            <form action="{{ route('population-data.update', $population->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jumlah_penduduk">Jumlah Penduduk</label>
                            <input type="number" id="jumlah_penduduk" name="jumlah_penduduk" class="form-control" placeholder="Jumlah Penduduk" value="{{ $population->jumlah_penduduk ?? '' }}">
                            @error('jumlah_penduduk') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jumlah_kk">Jumlah KK</label>
                            <input type="number" id="jumlah_kk" name="jumlah_kk" class="form-control" placeholder="Jumlah KK" value="{{ $population->jumlah_kk ?? '' }}">
                            @error('jumlah_kk') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jumlah_laki_laki">Jumlah Laki Laki</label>
                            <input type="number" id="jumlah_laki_laki" name="jumlah_laki_laki" class="form-control" placeholder="Jumlah Laki Laki" value="{{ $population->jumlah_laki_laki ?? '' }}">
                            @error('jumlah_laki_laki') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jumlah_perempuan">Jumlah Perempuan</label>
                            <input type="number" name="jumlah_perempuan" class="form-control" placeholder="Jumlah Perempuan" value="{{ $population->jumlah_perempuan ?? '' }}">
                            @error('jumlah_perempuan') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" name="tahun" class="form-control datepicker" placeholder="Tahun" data-date-format="yyyy" value="{{ $population->tahun ?? '' }}">
                            @error('tahun') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="garut_kota">Jumlah garut kota</label>
                            <input type="number" name="garut_kota" class="form-control" placeholder="Jumlah garut_kota" value="{{$population->garut_kota ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="garut_kota">Jumlah KK garut kota</label>
                            <input type="number" name="kk_garut_kota" class="form-control" placeholder="Jumlah KK garut kota" value="{{$population->kk_garut_kota ?? ''}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="karangpawitan">Jumlah karangpawitan</label>
                            <input type="number" name="karangpawitan" class="form-control"
                                placeholder="Jumlah karangpawitan" value="{{$population->karangpawitan ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="karangpawitan">Jumlah KK karangpawitan</label>
                            <input type="number" name="kk_karangpawitan" class="form-control"
                                placeholder="Jumlah KK karangpawitan" value="{{$population->kk_karangpawitan ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="wanaraja">Jumlah wanaraja</label>
                            <input type="number" name="wanaraja" class="form-control" placeholder="Jumlah wanaraja" value="{{$population->wanaraja ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="wanaraja">Jumlah KK wanaraja</label>
                            <input type="number" name="kk_wanaraja" class="form-control" placeholder="Jumlah KK wanaraja" value="{{$population->kk_wanaraja ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tarogong_kaler">Jumlah tarogong kaler</label>
                            <input type="number" name="tarogong_kaler" class="form-control"
                                placeholder="Jumlah tarogong_kaler" value="{{$population->tarogong_kaler ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tarogong_kaler">Jumlah KK tarogong kaler</label>
                            <input type="number" name="kk_tarogong_kaler" class="form-control"
                                placeholder="Jumlah KK tarogong kaler" value="{{$population->kk_tarogong_kaler ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tarogong_kidul">Jumlah tarogong kidul</label>
                            <input type="number" name="tarogong_kidul" class="form-control"
                                placeholder="Jumlah tarogong_kidul" value="{{$population->tarogong_kidul ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tarogong_kidul">Jumlah KK tarogong kidul</label>
                            <input type="number" name="kk_tarogong_kidul" class="form-control"
                                placeholder="Jumlah KK tarogong kidul" value="{{$population->kk_tarogong_kidul ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="banyuresmi">Jumlah banyuresmi</label>
                            <input type="number" name="banyuresmi" class="form-control" placeholder="Jumlah banyuresmi" value="{{$population->banyuresmi ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="banyuresmi">Jumlah KK banyuresmi</label>
                            <input type="number" name="kk_banyuresmi" class="form-control" placeholder="Jumlah KK banyuresmi" value="{{$population->kk_banyuresmi ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="samarang">Jumlah samarang</label>
                            <input type="number" name="samarang" class="form-control" placeholder="Jumlah samarang" value="{{$population->samarang ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="samarang">Jumlah KK samarang</label>
                            <input type="number" name="kk_samarang" class="form-control" placeholder="Jumlah KK samarang" value="{{$population->kk_samarang ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="pasirwangi">Jumlah pasirwangi</label>
                            <input type="number" name="pasirwangi" class="form-control" placeholder="Jumlah pasirwangi" value="{{$population->pasirwangi ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="pasirwangi">Jumlah KK pasirwangi</label>
                            <input type="number" name="kk_pasirwangi" class="form-control" placeholder="Jumlah KK pasirwangi" value="{{$population->kk_pasirwangi ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="leles">Jumlah leles</label>
                            <input type="number" name="leles" class="form-control" placeholder="Jumlah leles" value="{{$population->leles ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="leles">Jumlah KK leles</label>
                            <input type="number" name="kk_leles" class="form-control" placeholder="Jumlah KK leles" value="{{$population->kk_leles ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kadungora">Jumlah kadungora</label>
                            <input type="number" name="kadungora" class="form-control" placeholder="Jumlah kadungora" value="{{$population->kadungora ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kadungora">Jumlah KK kadungora</label>
                            <input type="number" name="kk_kadungora" class="form-control" placeholder="Jumlah KK kadungora" value="{{$population->kk_kadungora ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="leuwigoong">Jumlah leuwigoong</label>
                            <input type="number" name="leuwigoong" class="form-control" placeholder="Jumlah leuwigoong" value="{{$population->leuwigoong ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="leuwigoong">Jumlah KK leuwigoong</label>
                            <input type="number" name="kk_leuwigoong" class="form-control" placeholder="Jumlah KK leuwigoong" value="{{$population->kk_leuwigoong ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cibatu">Jumlah cibatu</label>
                            <input type="number" name="cibatu" class="form-control" placeholder="Jumlah cibatu" value="{{$population->cibatu ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cibatu">Jumlah KK cibatu</label>
                            <input type="number" name="kk_cibatu" class="form-control" placeholder="Jumlah KK cibatu" value="{{$population->kk_cibatu ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kersamanah">Jumlah kersamanah</label>
                            <input type="number" name="kersamanah" class="form-control" placeholder="Jumlah kersamanah" value="{{$population->kersamanah ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kersamanah">Jumlah KK kersamanah</label>
                            <input type="number" name="kk_kersamanah" class="form-control" placeholder="Jumlah KK kersamanah" value="{{$population->kk_kersamanah ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="malangbong">Jumlah malangbong</label>
                            <input type="number" name="malangbong" class="form-control" placeholder="Jumlah malangbong" value="{{$population->malangbong ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="malangbong">Jumlah KK malangbong</label>
                            <input type="number" name="kk_malangbong" class="form-control" placeholder="Jumlah KK malangbong" value="{{$population->kk_malangbong ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sukawening">Jumlah sukawening</label>
                            <input type="number" name="sukawening" class="form-control" placeholder="Jumlah sukawening" value="{{$population->sukawening ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sukawening">Jumlah KK sukawening</label>
                            <input type="number" name="kk_sukawening" class="form-control" placeholder="Jumlah KK sukawening" value="{{$population->kk_sukawening ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="karangtengah">Jumlah karangtengah</label>
                            <input type="number" name="karangtengah" class="form-control"
                                placeholder="Jumlah karangtengah" value="{{$population->karangtengah ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="karangtengah">Jumlah KK karangtengah</label>
                            <input type="number" name="kk_karangtengah" class="form-control"
                                placeholder="Jumlah KK karangtengah" value="{{$population->kk_karangtengah ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="bayongbong">Jumlah bayongbong</label>
                            <input type="number" name="bayongbong" class="form-control" placeholder="Jumlah bayongbong" value="{{$population->bayongbong ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="bayongbong">Jumlah KK bayongbong</label>
                            <input type="number" name="kk_bayongbong" class="form-control" placeholder="Jumlah KK bayongbong" value="{{$population->kk_bayongbong ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cigedug">Jumlah cigedug</label>
                            <input type="number" name="cigedug" class="form-control" placeholder="Jumlah cigedug" value="{{$population->cigedug ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cigedug">Jumlah KK cigedug</label>
                            <input type="number" name="kk_cigedug" class="form-control" placeholder="Jumlah KK cigedug" value="{{$population->kk_cigedug ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cilawu">Jumlah cilawu</label>
                            <input type="number" name="cilawu" class="form-control" placeholder="Jumlah cilawu" value="{{$population->cilawu ?? ''}}">

                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="cilawu">Jumlah KK cilawu</label>
                            <input type="number" name="kk_cilawu" class="form-control" placeholder="Jumlah KK cilawu" value="{{$population->kk_cilawu ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cisurupan">Jumlah cisurupan</label>
                            <input type="number" name="cisurupan" class="form-control" placeholder="Jumlah cisurupan" value="{{$population->cisurupan ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cisurupan">Jumlah KK cisurupan</label>
                            <input type="number" name="kk_cisurupan" class="form-control" placeholder="Jumlah KK cisurupan" value="{{$population->kk_cisurupan ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sukaresmi">Jumlah sukaresmi</label>
                            <input type="number" name="sukaresmi" class="form-control" placeholder="Jumlah sukaresmi" value="{{$population->sukaresmi ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sukaresmi">Jumlah KK sukaresmi</label>
                            <input type="number" name="kk_sukaresmi" class="form-control" placeholder="Jumlah KK sukaresmi" value="{{$population->kk_sukaresmi ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cikajang">Jumlah cikajang</label>
                            <input type="number" name="cikajang" class="form-control" placeholder="Jumlah cikajang" value="{{$population->cikajang ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cikajang">Jumlah KK cikajang</label>
                            <input type="number" name="kk_cikajang" class="form-control" placeholder="Jumlah KK cikajang" value="{{$population->kk_cikajang ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="banjarwangi">Jumlah banjarwangi</label>
                            <input type="number" name="banjarwangi" class="form-control"
                                placeholder="Jumlah banjarwangi" value="{{$population->banjarwangi ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="banjarwangi">Jumlah KK banjarwangi</label>
                            <input type="number" name="kk_banjarwangi" class="form-control"
                                placeholder="Jumlah KK banjarwangi" value="{{$population->kk_banjarwangi ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="singajaya">Jumlah singajaya</label>
                            <input type="number" name="singajaya" class="form-control" placeholder="Jumlah singajaya" value="{{$population->singajaya ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="singajaya">Jumlah KK singajaya</label>
                            <input type="number" name="kk_singajaya" class="form-control" placeholder="Jumlah KK singajaya" value="{{$population->kk_singajaya ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cihurip">Jumlah cihurip</label>
                            <input type="number" name="cihurip" class="form-control" placeholder="Jumlah cihurip" value="{{$population->cihurip ?? ''}}">

                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="cihurip">Jumlah KK cihurip</label>
                            <input type="number" name="kk_cihurip" class="form-control" placeholder="Jumlah KK cihurip" value="{{$population->kk_cihurip ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="peundeuy">Jumlah peundeuy</label>
                            <input type="number" name="peundeuy" class="form-control" placeholder="Jumlah peundeuy" value="{{$population->peundeuy ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="peundeuy">Jumlah KK peundeuy</label>
                            <input type="number" name="kk_peundeuy" class="form-control" placeholder="Jumlah KK peundeuy" value="{{$population->kk_peundeuy ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="pameungpeuk">Jumlah pameungpeuk</label>
                            <input type="number" name="pameungpeuk" class="form-control"
                                placeholder="Jumlah pameungpeuk" value="{{$population->pameungpeuk ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="pameungpeuk">Jumlah KK pameungpeuk</label>
                            <input type="number" name="kk_pameungpeuk" class="form-control"
                                placeholder="Jumlah KK pameungpeuk" value="{{$population->kk_pameungpeuk ?? ''}}">

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cisompet">Jumlah cisompet</label>
                            <input type="number" name="cisompet" class="form-control" placeholder="Jumlah cisompet" value="{{$population->cisompet ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cisompet">Jumlah KK cisompet</label>
                            <input type="number" name="kk_cisompet" class="form-control" placeholder="Jumlah KK cisompet" value="{{$population->kk_cisompet ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cibalong">Jumlah cibalong</label>
                            <input type="number" name="cibalong" class="form-control" placeholder="Jumlah cibalong" value="{{$population->cibalong ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cibalong">Jumlah KK cibalong</label>
                            <input type="number" name="kk_cibalong" class="form-control" placeholder="Jumlah KK cibalong" value="{{$population->kk_cibalong ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cikelet">Jumlah cikelet</label>
                            <input type="number" name="cikelet" class="form-control" placeholder="Jumlah cikelet" value="{{$population->cikelet ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cikelet">Jumlah KK cikelet</label>
                            <input type="number" name="kk_cikelet" class="form-control" placeholder="Jumlah KK cikelet" value="{{$population->kk_cikelet ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="bungbulang">Jumlah bungbulang</label>
                            <input type="number" name="bungbulang" class="form-control" placeholder="Jumlah bungbulang" value="{{$population->bungbulang ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="bungbulang">Jumlah KK bungbulang</label>
                            <input type="number" name="kk_bungbulang" class="form-control" placeholder="Jumlah KK bungbulang" value="{{$population->kk_bungbulang ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="mekarmukti">Jumlah mekarmukti</label>
                            <input type="number" name="mekarmukti" class="form-control" placeholder="Jumlah mekarmukti" value="{{$population->mekarmukti ?? ''}}">

                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="mekarmukti">Jumlah KK mekarmukti</label>
                            <input type="number" name="kk_mekarmukti" class="form-control" placeholder="Jumlah KK mekarmukti" value="{{$population->kk_mekarmukti ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="pakenjeng">Jumlah pakenjeng</label>
                            <input type="number" name="pakenjeng" class="form-control" placeholder="Jumlah pakenjeng" value="{{$population->pakenjeng ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="pakenjeng">Jumlah KK pakenjeng</label>
                            <input type="number" name="kk_pakenjeng" class="form-control" placeholder="Jumlah KK pakenjeng" value="{{$population->kk_pakenjeng ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="pamulihan">Jumlah pamulihan</label>
                            <input type="number" name="pamulihan" class="form-control" placeholder="Jumlah pamulihan" value="{{$population->pamulihan ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="pamulihan">Jumlah KK pamulihan</label>
                            <input type="number" name="kk_pamulihan" class="form-control" placeholder="Jumlah KK pamulihan" value="{{$population->kk_pamulihan ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cisewu">Jumlah cisewu</label>
                            <input type="number" name="cisewu" class="form-control" placeholder="Jumlah cisewu" value="{{$population->cisewu ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cisewu">Jumlah KK cisewu</label>
                            <input type="number" name="kk_cisewu" class="form-control" placeholder="Jumlah KK cisewu" value="{{$population->kk_cisewu ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="caringin">Jumlah caringin</label>
                            <input type="number" name="caringin" class="form-control" placeholder="Jumlah caringin" value="{{$population->caringin ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="caringin">Jumlah KK caringin</label>
                            <input type="number" name="kk_caringin" class="form-control" placeholder="Jumlah KK caringin" value="{{$population->kk_caringin ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="talegong">Jumlah talegong</label>
                            <input type="number" name="talegong" class="form-control" placeholder="Jumlah talegong" value="{{$population->talegong ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="talegong">Jumlah KK talegong</label>
                            <input type="number" name="kk_talegong" class="form-control" placeholder="Jumlah KK talegong" value="{{$population->kk_talegong ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="balubur_limbangan">Jumlah balubur_limbangan</label>
                            <input type="number" name="balubur_limbangan" class="form-control"
                                placeholder="Jumlah balubur_limbangan" value="{{$population->balubur_limbangan ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="balubur_limbangan">Jumlah KK balubur limbangan</label>
                            <input type="number" name="kk_balubur_limbangan" class="form-control"
                                placeholder="Jumlah KK balubur limbangan" value="{{$population->kk_balubur_limbangan ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="selaawi">Jumlah selaawi</label>
                            <input type="number" name="selaawi" class="form-control" placeholder="Jumlah selaawi" value="{{$population->selaawi ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="selaawi">Jumlah KK selaawi</label>
                            <input type="number" name="kk_selaawi" class="form-control" placeholder="Jumlah KK selaawi" value="{{$population->kk_selaawi ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cibiuk">Jumlah cibiuk</label>
                            <input type="number" name="cibiuk" class="form-control" placeholder="Jumlah cibiuk" value="{{$population->cibiuk ?? ''}}">

                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="cibiuk">Jumlah KK cibiuk</label>
                            <input type="number" name="kk_cibiuk" class="form-control" placeholder="Jumlah KK cibiuk" value="{{$population->kk_cibiuk ?? ''}}">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="pangatikan">Jumlah pangatikan</label>
                            <input type="number" name="pangatikan" class="form-control" placeholder="Jumlah pangatikan" value="{{$population->pangatikan ?? ''}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="pangatikan">Jumlah KK pangatikan</label>
                            <input type="number" name="kk_pangatikan" class="form-control" placeholder="Jumlah KK pangatikan" value="{{$population->kk_pangatikan ?? ''}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sucinaraja">Jumlah sucinaraja</label>
                            <input type="number" name="sucinaraja" class="form-control" placeholder="Jumlah sucinaraja" value="{{$population->sucinaraja ?? ''}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sucinaraja">Jumlah KK sucinaraja</label>
                            <input type="number" name="kk_sucinaraja" class="form-control" placeholder="Jumlah KK sucinaraja" value="{{$population->kk_sucinaraja ?? ''}}">
                        </div>
                    </div>
                </div>
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
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'yyyy',
            startView: 'years',
            minViewMode: 'years',
            autoclose: true
        });
    });
</script>
@endpush
