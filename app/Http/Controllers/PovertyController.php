<?php

namespace App\Http\Controllers;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Poverty;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;
use Str;
use View;

class PovertyController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:poverty-list|poverty-create|poverty-edit|poverty-delete', ['only' => ['index','show']]);
         $this->middleware('permission:poverty-create', ['only' => ['create','store']]);
         $this->middleware('permission:poverty-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:poverty-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $userRole = Auth::user()->role;
        if ($userRole == "Admin") {
            $povertys = Poverty::with('kecamatan', 'desa')->paginate(10);
            $years = Poverty::distinct('tahun_input')->pluck('tahun_input')->toArray();
        } else {
            $userCity = Auth::user()->city; // Assuming 'city' is the field name in the User model
            $kecamatan = Kecamatan::where('name', $userCity)->first();
            $selectedKecamatan = $kecamatan->id;
            $povertys = Poverty::with('kecamatan', 'desa')->where('id_kecamatan', $selectedKecamatan)->paginate(10);
           
            $years = Poverty::distinct('tahun_input')->pluck('tahun_input')->toArray();
            
        }
        

        return view('poverty.index', compact('povertys', 'years'));
    }

    public function searchData(Request $request)
    {
        $query = $request->input('query');
        $page = $request->input('page', 1);

        $povertys = Poverty::where('nama', 'LIKE', '%'.$query.'%')->orWhere('nik', 'LIKE', '%' . $query . '%')->paginate(5, ['*'], 'page', $page);

        $table = View::make('poverty.partial_table', compact('povertys'))->render();
        $pagination = $povertys->links('pagination::bootstrap-4')->render();

        return response()->json([
            'table' => $table,
            'pagination' => $pagination,
        ]);
    }

    public function filterData(Request $request)
    {
        $filterKecamatan = $request->input('kecamatan');
        $filterDesil = $request->input('desil');
        $filterTahun = $request->input('tahun');
        $filterStatusBantuan = $request->input('status_bantuan');
        $page = $request->input('page', 1);

        $query = Poverty::query();

        if ($filterKecamatan !== 'semua') {
            $query->where('id_kecamatan', $filterKecamatan);
        }

        if ($filterDesil !== 'semua') {
            $query->where('desil', $filterDesil);
        }

        if ($filterTahun !== 'semua') {
            $query->where('tahun_input', $filterTahun);
        }

        if ($filterStatusBantuan !== 'semua') {
            $query->where('status_bantuan', $filterStatusBantuan);
        }

        $povertys = $query->paginate(5, ['*'], 'page', $page);

        $table = View::make('poverty.partial_table', compact('povertys'))->render();
        $pagination = $povertys->links('pagination::bootstrap-4')->render();

        return response()->json([
            'table' => $table,
            'pagination' => $pagination,
        ]);
    }


    public function create() {
        $kecamatan = Kecamatan::all();
        $selectedKecamatanId = null;
        $selectedDesaId = null;
    
        if (Auth::check() && Auth::user()->role === 'Kecamatan' && Auth::user()->city) {
            $selectedKecamatan = Auth::user()->city;
            $userRole = Auth::user()->role;
            $selectedKecamatanId = Kecamatan::where('name', $selectedKecamatan)->value('id');
            // dd($selectedKecamatanId);
        }else{
            $userRole = '';
        }
    
        return view('poverty.create', compact('kecamatan', 'selectedKecamatanId', 'userRole', 'selectedDesaId'));
    }

    public function getDesa($id_kecamatan)
    {
        $kecamatan = Kecamatan::find($id_kecamatan);

        if (!$kecamatan) {
            return response()->json(['error' => 'Kecamatan tidak ditemukan'], 404);
        }

        $desa = Desa::where('id_kecamatan', $id_kecamatan)->get();

        return response()->json($desa);
    }

    
    public function store(Request $request)
    {
        //  dd($request);
        $validatedData = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'jk' => 'required',
            'tgl' => 'required',
            'jenis_pekerjaan' => 'required',
            'desil' => 'required',
            'dtks' => 'required',
            'penghasilan_perbulan' => 'required',
            'tahun_input' => 'required',
            'id_p3ke' => 'required',
            'id_kemendagri' => 'required',
            'id_individu' => 'required',
            'padan_dukcapil' => 'required',
            'status_kawin' => 'required',
            'bpnt' => 'required',
            'bpum' => 'required',
            'bst' => 'required',
            'sembako' => 'required',
            'pkh' => 'required',
            'stunting' => 'required',
            'verifikasi' => 'required',
            'dibawah_7' => 'required',
            'usia_7_12' => 'required',
            'usia_13_15' => 'required',
            'usia_16_18' => 'required',
            'usia_19_21' => 'required',
            'usia_22_59' => 'required',
            'lebih_60' => 'required',
        ]);
        $data = Poverty::create($validatedData);
        $data->jenis_pekerjaan = $request->jenis_pekerjaan;
        $data->id_kecamatan = $request->id_kecamatan;
        $data->id_desa = $request->id_desa;
        $data->pendidikan_terakhir = $request->pendidikan_terakhir;
        // dd($data);
        // if ($request->hasFile('foto_diri')) {
        //     $fotoDiri = $request->file('foto_diri');
        //     $fotoDiriPath = Str::random(5) . '.' . $fotoDiri->getClientOriginalExtension();

        //     Storage::putFileAs('public/foto_diri', $fotoDiri, $fotoDiriPath);
        //     $data->foto_diri = $fotoDiriPath;
        // }

        // if ($request->hasFile('foto_rumah')) {
        //     $fotoRumah = $request->file('foto_rumah');
        //     $fotoRumahPath = Str::random(5) . '.' . $fotoRumah->getClientOriginalExtension();
        //     Storage::putFileAs('public/foto_rumah', $fotoRumah, $fotoRumahPath);
        //     $data->foto_rumah = $fotoRumahPath;
        // }
        if($request->dtks === "YA" || $request->bpnt === "YA" || $request->bpum === "YA" || $request->bst === "YA" || $request->sembako === "YA" || $request->pkh === "YA"){
            $data->status_bantuan = 2;
        }else{
            $data->status_bantuan = 1;
        }

        if ($data->save()) {
            Alert::success('Sukses', 'Data Kemiskinan berhasil disimpan.')->autoclose(3500);
        } else {
            Alert::error('Error', 'Terjadi kesalahan saat menyimpan data.')->autoclose(3500);
        }

        return redirect('poverty');
    }
    public function edit($id)
    {
        $kecamatan = Kecamatan::all();
        $desa = Desa::all(); // Inisialisasi koleksi kosong untuk opsi desa

        if (Auth::check() && Auth::user()->role === 'Kecamatan' && Auth::user()->city) {
            $selectedKecamatan = Auth::user()->city;
            $userRole = Auth::user()->role;
            $selectedKecamatanId = Kecamatan::where('name', $selectedKecamatan)->value('id');
            $desa = Desa::where('id_kecamatan', $selectedKecamatanId)->get();
        } else {
            $userRole = '';
        }

        $poverty = Poverty::find($id);
        $selectedKecamatanId = $poverty->id_kecamatan;
        $selectedDesaId = $poverty->id_desa;

        if (!$poverty) {
            return redirect('poverty')->with('error', 'Data kemiskinan tidak ditemukan.');
        }

        return view('poverty.edit', compact('poverty', 'kecamatan', 'desa', 'selectedKecamatanId', 'selectedDesaId', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'jk' => 'required',
            'tgl' => 'required',
            'jenis_pekerjaan' => 'required',
            'desil' => 'required',
            'dtks' => 'required',
            'penghasilan_perbulan' => 'required',
            'tahun_input' => 'required',
            'id_p3ke' => 'required',
            'id_kemendagri' => 'required',
            'id_individu' => 'required',
            'padan_dukcapil' => 'required',
            'status_kawin' => 'required',
            'bpnt' => 'required',
            'bpum' => 'required',
            'bst' => 'required',
            'sembako' => 'required',
            'pkh' => 'required',
            'stunting' => 'required',
            'verifikasi' => 'required',
            'dibawah_7' => 'required',
            'usia_7_12' => 'required',
            'usia_13_15' => 'required',
            'usia_16_18' => 'required',
            'usia_19_21' => 'required',
            'usia_22_59' => 'required',
            'lebih_60' => 'required',
            // 'kk' => 'required',
            // 'rt' => 'required',
            // 'rw' => 'required',
            // 'tempat_tinggal' => 'required',
            // 'sumber_air_minum' => 'required',
            // 'bahan_bakar_memasak' => 'required',
            // 'bantuan_diterima' => 'required',
            // 'sumber_penerangan_utama' => 'required',
            // 'bab' => 'required',
        ]);

        $data = Poverty::findOrFail($id);
        $data->jenis_pekerjaan = $request->jenis_pekerjaan;
        $data->id_kecamatan = $request->id_kecamatan;
        $data->pendidikan_terakhir = $request->pendidikan_terakhir;
        $data->id_desa = $request->id_desa;
        $data->update($validatedData);

        // if ($request->hasFile('foto_diri')) {
        //     $fotoDiri = $request->file('foto_diri');
        //     $fotoDiriPath = Str::random(20) . '.' . $fotoDiri->getClientOriginalExtension();
        //     Storage::putFileAs('public/foto_diri', $fotoDiri, $fotoDiriPath);
        //     $data->foto_diri = $fotoDiriPath;
        // }

        // if ($request->hasFile('foto_rumah')) {
        //     $fotoRumah = $request->file('foto_rumah');
        //     $fotoRumahPath = Str::random(20) . '.' . $fotoRumah->getClientOriginalExtension();
        //     Storage::putFileAs('public/foto_rumah', $fotoRumah, $fotoRumahPath);
        //     $data->foto_rumah = $fotoRumahPath;
        // }

        if($request->dtks === "YA" || $request->bpnt === "YA" || $request->bpum === "YA" || $request->bst === "YA" || $request->sembako === "YA" || $request->pkh === "YA"){
            $data->status_bantuan = 2;
        }else{
            $data->status_bantuan = 1;
        }


        if ($data->save()) {
            Alert::success('Sukses', 'Data Kemiskinan berhasil disimpan.')->autoclose(3500);
        } else {
            Alert::error('Error', 'Terjadi kesalahan saat menyimpan data.')->autoclose(3500);
        }

        return redirect('poverty');
    }

    public function getPovertyAssistance($id)
    {

        $poverty = Poverty::findOrFail($id);

        if ($poverty->count() > 0) {
            return response()->json($poverty);
        } else {
            // Jika tidak ada data bantuan, kirimkan pesan kosong sebagai respons JSON
            return response()->json([]);
        }
    }
    public function show($id)
    {
        $poverty = Poverty::with('kecamatan', 'desa', 'assistance.assistDetails')->findOrFail($id);
        if (!$poverty) {
            return redirect('poverty')->with('error', 'Data tidak ditemukan.');
        }

        return view('poverty.show', compact('poverty'));
    }

    public function confirmDelete($id)
    {
        $poverty = Poverty::findOrFail($id);
        return view('poverty.confirm-delete', compact('poverty'));
    }

    public function delete($id)
    {
        $poverty = Poverty::findOrFail($id);

        if ($poverty->delete()) {
            Alert::success('Sukses', 'Data berhasil dihapus.')->autoclose(3500);
        } else {
            Alert::error('Error', 'Terjadi kesalahan saat menghapus data.')->autoclose(3500);
        }

        return redirect('poverty');
    }

    public function getKecamatan()
    {
        $kecamatan = Kecamatan::all();

        return response()->json([
            'status' => 'success',
            'data' => $kecamatan
        ]);
    }
    // public function getDesa($id_kecamatan)
    // {
    //     $kecamatan = Kecamatan::find($id_kecamatan);

    //     if (!$kecamatan) {
    //         return response()->json(['error' => 'Kecamatan tidak ditemukan'], 404);
    //     }

    //     $desa = Desa::where('id_kecamatan', $id_kecamatan)->get();

    //     return response()->json($desa);
    // }

    


}
