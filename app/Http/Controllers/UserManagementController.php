<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Alert;
use View;

class UserManagementController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','show']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $nameKecamatan =  Kecamatan::all();
        // dd($nameKecamatan);
        $userRole = Auth::user()->role;
        if ($userRole == "Admin") {
            $users = User::paginate(5);
        } else {
            $userCity = Auth::user()->city; // Assuming 'city' is the field name in the User model
           
            $users = User::where('city', $userCity)->paginate(5);
           
            
        }
        // $users = User::paginate(5);

        return view('users.index', compact('users', 'nameKecamatan'));
    }
    public function filterData(Request $request)
    {

        $filterKecamatan = $request->input('kecamatan');
        $filterRole = $request->input('role');
        $page = $request->input('page', 1);

        $query = User::query();

        if ($filterKecamatan !== 'semua') {
            $query->where('city', $filterKecamatan);
        }

        if ($filterRole !== 'semua') {
            $query->where('role', $filterRole);
        }

        $users = $query->paginate(5, ['*'], 'page', $page);

        $table = View::make('users.partial_table', compact('users'))->render();
        $pagination = $users->links('pagination::bootstrap-4')->render();

        return response()->json([
            'table' => $table,
            'pagination' => $pagination,
        ]);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        $kecamatan = Kecamatan::all();
        $selectedKecamatanId = null;
        $selectedKecamatanName = null; // Add this line
        
        if (Auth::check() && Auth::user()->role === 'Kecamatan' && Auth::user()->city) {
            $selectedKecamatanName = Auth::user()->city; // Assign the value here
            $userRole = Auth::user()->role;
            $selectedKecamatanId = Kecamatan::where('name', $selectedKecamatanName)->value('id');
        } else {
            $userRole = Auth::user()->role;
        }
        
        return view('users.create', compact('roles', 'kecamatan', 'selectedKecamatanId', 'selectedKecamatanName', 'userRole'));
    }
    
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'username' => 'required|max:255|min:5',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'konfirm-pass' => 'required|same:password',
            'phone' => 'required|min:10|max:15',
            'roles' => 'required|array',
        ], [
            'konfirm-pass.same' => 'Password Harus Sama.',
        ]);

        // Create the user
        $user = User::create($attributes);

        // Assign roles
        $user->assignRole($attributes['roles']);
        
        // Set the role attribute
        $user->city = $request->city;
        $user->desa = $request->desa;
        $user->role = $attributes['roles'][0];
        $user->save();

        if ($user) {
            Alert::success('Sukses', 'Data berhasil disimpan.')->autoclose(3500);
        } else {
            Alert::error('Error', 'Terjadi kesalahan saat menyimpan data.')->autoclose(3500);
        }

        return redirect('user-management');
    }


    public function edit($id)
    {

        $roles = Role::pluck('name', 'name')->all();
        $kecamatan = Kecamatan::all();
        $selectedKecamatanId = null;
        $selectedKecamatanName = null; // Add this line
        
        if (Auth::check() && Auth::user()->role === 'Kecamatan' && Auth::user()->city) {
            $selectedKecamatanName = Auth::user()->city; // Assign the value here
            $userRole = Auth::user()->role;
            $selectedKecamatanId = Kecamatan::where('name', $selectedKecamatanName)->value('id');
        } else {
            $userRole = Auth::user()->role;
        }

        $user = User::find($id);
        // $roles = Role::pluck('name','name')->all();
        // $userRole = $user->roles->pluck('name','name')->all();
        // ,compact('roles')
        if (!$user) {
            return redirect('user-management')->with('error', 'Pengguna tidak ditemukan.');
        }

        return view('users.edit', compact('user', 'roles',  'kecamatan', 'selectedKecamatanId', 'selectedKecamatanName', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $attributes = $request->validate([
            'username' => 'max:255|min:5',
            'phone' => 'min:10|max:15',
        ], [
            'konfirm-pass.same' => 'Password Harus Sama.',
        ]);

        $user = User::findOrFail($id);
        $user->username = $attributes['username'];
        $user->phone = $attributes['phone'];
        // $user->role = $request->role;
        $user->email = $request->email;
        $user->city = ucwords(strtolower($request->kecamatan_name));
        $user->desa = ucwords(strtolower($request->desa));

        if (!empty($request->password)) {
            $user->password = $request->password;
        }

        $user->assignRole($request->input('roles'));
        $user->save();

        if ($user) {
            Alert::success('Sukses', 'Data berhasil diubah.')->autoclose(3500);
        } else {
            Alert::error('Error', 'Terjadi kesalahan saat menyimpan data.')->autoclose(3500);
        }

        return redirect('user-management');
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect('user-management')->with('error', 'Pengguna tidak ditemukan.');
        }
        return view('users.show', compact('user'));
    }

    public function confirmDelete($id)
    {
        $user = User::findOrFail($id);
        return view('user-management.confirm-delete', compact('user'));
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        if ($user->delete()) {
            Alert::success('Sukses', 'Data berhasil dihapus.')->autoclose(3500);
        } else {
            Alert::error('Error', 'Terjadi kesalahan saat menghapus data.')->autoclose(3500);
        }

        return redirect('user-management');
    }

}
