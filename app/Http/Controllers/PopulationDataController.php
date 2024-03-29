<?php

namespace App\Http\Controllers;
use App\Models\Population;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class PopulationDataController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:population-list|population-create|population-edit|population-delete', ['only' => ['index','show']]);
         $this->middleware('permission:population-create', ['only' => ['create','store']]);
         $this->middleware('permission:population-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:population-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $populations = Population::paginate(5);

        return view('populationdata.index', compact('populations'));
    }
    public function create()
    {
        return view('populationdata.create');
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'jumlah_penduduk' => 'required|numeric',
            'jumlah_kk' => 'required|numeric',
            'jumlah_laki_laki' => 'required|numeric',
            'jumlah_perempuan' => 'required|numeric',
            'tahun' => 'required|numeric',
        ]);


        $population = Population::create($attributes);
        $population->garut_kota = $request->garut_kota;
        $population->karangpawitan = $request->karangpawitan;
        $population->wanaraja = $request->wanaraja;
        $population->tarogong_kaler = $request->tarogong_kaler;
        $population->tarogong_kidul = $request->tarogong_kidul;
        $population->banyuresmi = $request->banyuresmi;
        $population->samarang = $request->samarang;
        $population->pasirwangi = $request->pasirwangi;
        $population->leles = $request->leles;
        $population->kadungora = $request->kadungora;
        $population->leuwigoong = $request->leuwigoong;
        $population->cibatu = $request->cibatu;
        $population->kersamanah = $request->kersamanah;
        $population->malangbong = $request->malangbong;
        $population->sukawening = $request->sukawening;
        $population->karangtengah = $request->karangtengah;
        $population->bayongbong = $request->bayongbong;
        $population->cigedug = $request->cigedug;
        $population->cilawu = $request->cilawu;
        $population->cisurupan = $request->cisurupan;
        $population->sukaresmi = $request->sukaresmi;
        $population->cikajang = $request->cikajang;
        $population->banjarwangi = $request->banjarwangi;
        $population->singajaya = $request->singajaya;
        $population->cihurip = $request->cihurip;
        $population->peundeuy = $request->peundeuy;
        $population->pameungpeuk = $request->pameungpeuk;
        $population->cisompet = $request->cisompet;
        $population->cibalong = $request->cibalong;
        $population->cikelet = $request->cikelet;
        $population->bungbulang = $request->bungbulang;
        $population->mekarmukti = $request->mekarmukti;
        $population->pakenjeng = $request->pakenjeng;
        $population->pamulihan = $request->pamulihan;
        $population->cisewu = $request->cisewu;
        $population->caringin = $request->caringin;
        $population->talegong = $request->talegong;
        $population->balubur_limbangan = $request->balubur_limbangan;
        $population->selaawi = $request->selaawi;
        $population->cibiuk = $request->cibiuk;
        $population->pangatikan = $request->pangatikan;
        $population->sucinaraja = $request->sucinaraja;

        $population->kk_garut_kota = $request->kk_garut_kota;
        $population->kk_karangpawitan = $request->kk_karangpawitan;
        $population->kk_wanaraja = $request->kk_wanaraja;
        $population->kk_tarogong_kaler = $request->kk_tarogong_kaler;
        $population->kk_tarogong_kidul = $request->kk_tarogong_kidul;
        $population->kk_banyuresmi = $request->kk_banyuresmi;
        $population->kk_samarang = $request->kk_samarang;
        $population->kk_pasirwangi = $request->kk_pasirwangi;
        $population->kk_leles = $request->kk_leles;
        $population->kk_kadungora = $request->kk_kadungora;
        $population->kk_leuwigoong = $request->kk_leuwigoong;
        $population->kk_cibatu = $request->kk_cibatu;
        $population->kk_kersamanah = $request->kk_kersamanah;
        $population->kk_malangbong = $request->kk_malangbong;
        $population->kk_sukawening = $request->kk_sukawening;
        $population->kk_karangtengah = $request->kk_karangtengah;
        $population->kk_bayongbong = $request->kk_bayongbong;
        $population->kk_cigedug = $request->kk_cigedug;
        $population->kk_cilawu = $request->kk_cilawu;
        $population->kk_cisurupan = $request->kk_cisurupan;
        $population->kk_sukaresmi = $request->kk_sukaresmi;
        $population->kk_cikajang = $request->kk_cikajang;
        $population->kk_banjarwangi = $request->kk_banjarwangi;
        $population->kk_singajaya = $request->kk_singajaya;
        $population->kk_cihurip = $request->kk_cihurip;
        $population->kk_peundeuy = $request->kk_peundeuy;
        $population->kk_pameungpeuk = $request->kk_pameungpeuk;
        $population->kk_cisompet = $request->kk_cisompet;
        $population->kk_cibalong = $request->kk_cibalong;
        $population->kk_cikelet = $request->kk_cikelet;
        $population->kk_bungbulang = $request->kk_bungbulang;
        $population->kk_mekarmukti = $request->kk_mekarmukti;
        $population->kk_pakenjeng = $request->kk_pakenjeng;
        $population->kk_pamulihan = $request->kk_pamulihan;
        $population->kk_cisewu = $request->kk_cisewu;
        $population->kk_caringin = $request->kk_caringin;
        $population->kk_talegong = $request->kk_talegong;
        $population->kk_balubur_limbangan = $request->kk_balubur_limbangan;
        $population->kk_selaawi = $request->kk_selaawi;
        $population->kk_cibiuk = $request->kk_cibiuk;
        $population->kk_pangatikan = $request->kk_pangatikan;
        $population->kk_sucinaraja = $request->kk_sucinaraja;

        if ($population->save()) {
            Alert::success('Sukses', 'Data Penduduk berhasil disimpan.')->autoclose(3500);
        } else {
            Alert::error('Error', 'Terjadi kesalahan saat menyimpan data.')->autoclose(3500);
        }

        return redirect('population-data');
    }

    public function edit($id)
    {
        $population = Population::find($id);
        if (!$population) {
            return redirect('population-data')->with('error', 'Pengguna tidak ditemukan.');
        }
        return view('populationdata.edit', compact('population'));
    }

    public function update(Request $request, $id)
    {

        $population = Population::findOrFail($id);

        $population->jumlah_penduduk = $request->jumlah_penduduk;
        $population->jumlah_kk = $request->jumlah_kk;
        $population->jumlah_laki_laki = $request->jumlah_laki_laki;
        $population->jumlah_perempuan = $request->jumlah_perempuan;
        $population->tahun = $request->tahun;
        $population->garut_kota = $request->garut_kota;
        $population->karangpawitan = $request->karangpawitan;
        $population->wanaraja = $request->wanaraja;
        $population->tarogong_kaler = $request->tarogong_kaler;
        $population->tarogong_kidul = $request->tarogong_kidul;
        $population->banyuresmi = $request->banyuresmi;
        $population->samarang = $request->samarang;
        $population->pasirwangi = $request->pasirwangi;
        $population->leles = $request->leles;
        $population->kadungora = $request->kadungora;
        $population->leuwigoong = $request->leuwigoong;
        $population->cibatu = $request->cibatu;
        $population->kersamanah = $request->kersamanah;
        $population->malangbong = $request->malangbong;
        $population->sukawening = $request->sukawening;
        $population->karangtengah = $request->karangtengah;
        $population->bayongbong = $request->bayongbong;
        $population->cigedug = $request->cigedug;
        $population->cilawu = $request->cilawu;
        $population->cisurupan = $request->cisurupan;
        $population->sukaresmi = $request->sukaresmi;
        $population->cikajang = $request->cikajang;
        $population->banjarwangi = $request->banjarwangi;
        $population->singajaya = $request->singajaya;
        $population->cihurip = $request->cihurip;
        $population->peundeuy = $request->peundeuy;
        $population->pameungpeuk = $request->pameungpeuk;
        $population->cisompet = $request->cisompet;
        $population->cibalong = $request->cibalong;
        $population->cikelet = $request->cikelet;
        $population->bungbulang = $request->bungbulang;
        $population->mekarmukti = $request->mekarmukti;
        $population->pakenjeng = $request->pakenjeng;
        $population->pamulihan = $request->pamulihan;
        $population->cisewu = $request->cisewu;
        $population->caringin = $request->caringin;
        $population->talegong = $request->talegong;
        $population->balubur_limbangan = $request->balubur_limbangan;
        $population->selaawi = $request->selaawi;
        $population->cibiuk = $request->cibiuk;
        $population->pangatikan = $request->pangatikan;
        $population->sucinaraja = $request->sucinaraja;
        $population->kk_garut_kota = $request->kk_garut_kota;
        $population->kk_karangpawitan = $request->kk_karangpawitan;
        $population->kk_wanaraja = $request->kk_wanaraja;
        $population->kk_tarogong_kaler = $request->kk_tarogong_kaler;
        $population->kk_tarogong_kidul = $request->kk_tarogong_kidul;
        $population->kk_banyuresmi = $request->kk_banyuresmi;
        $population->kk_samarang = $request->kk_samarang;
        $population->kk_pasirwangi = $request->kk_pasirwangi;
        $population->kk_leles = $request->kk_leles;
        $population->kk_kadungora = $request->kk_kadungora;
        $population->kk_leuwigoong = $request->kk_leuwigoong;
        $population->kk_cibatu = $request->kk_cibatu;
        $population->kk_kersamanah = $request->kk_kersamanah;
        $population->kk_malangbong = $request->kk_malangbong;
        $population->kk_sukawening = $request->kk_sukawening;
        $population->kk_karangtengah = $request->kk_karangtengah;
        $population->kk_bayongbong = $request->kk_bayongbong;
        $population->kk_cigedug = $request->kk_cigedug;
        $population->kk_cilawu = $request->kk_cilawu;
        $population->kk_cisurupan = $request->kk_cisurupan;
        $population->kk_sukaresmi = $request->kk_sukaresmi;
        $population->kk_cikajang = $request->kk_cikajang;
        $population->kk_banjarwangi = $request->kk_banjarwangi;
        $population->kk_singajaya = $request->kk_singajaya;
        $population->kk_cihurip = $request->kk_cihurip;
        $population->kk_peundeuy = $request->kk_peundeuy;
        $population->kk_pameungpeuk = $request->kk_pameungpeuk;
        $population->kk_cisompet = $request->kk_cisompet;
        $population->kk_cibalong = $request->kk_cibalong;
        $population->kk_cikelet = $request->kk_cikelet;
        $population->kk_bungbulang = $request->kk_bungbulang;
        $population->kk_mekarmukti = $request->kk_mekarmukti;
        $population->kk_pakenjeng = $request->kk_pakenjeng;
        $population->kk_pamulihan = $request->kk_pamulihan;
        $population->kk_cisewu = $request->kk_cisewu;
        $population->kk_caringin = $request->kk_caringin;
        $population->kk_talegong = $request->kk_talegong;
        $population->kk_balubur_limbangan = $request->kk_balubur_limbangan;
        $population->kk_selaawi = $request->kk_selaawi;
        $population->kk_cibiuk = $request->kk_cibiuk;
        $population->kk_pangatikan = $request->kk_pangatikan;
        $population->kk_sucinaraja = $request->kk_sucinaraja;

        $population->save();

        if ($population) {
            Alert::success('Sukses', 'Data berhasil diubah.')->autoclose(3500);
        } else {
            Alert::error('Error', 'Terjadi kesalahan saat menyimpan data.')->autoclose(3500);
        }

        return redirect('population-data');
    }

    public function confirmDelete($id)
    {
        $population = Population::findOrFail($id);
        return view('populationdata.confirm-delete', compact('population'));
    }

    public function delete($id)
    {
        $population = Population::findOrFail($id);

        if ($population->delete()) {
            Alert::success('Sukses', 'Data berhasil dihapus.')->autoclose(3500);
        } else {
            Alert::error('Error', 'Terjadi kesalahan saat menghapus data.')->autoclose(3500);
        }

        return redirect('population-data');
    }

}
