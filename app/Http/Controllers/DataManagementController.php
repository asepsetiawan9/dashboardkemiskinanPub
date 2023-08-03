<?php

namespace App\Http\Controllers;

use App\Exports\DataManagementExport;
use App\Imports\DataManagementImport;
use DB;
use Alert;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Storage;
class DataManagementController extends Controller
{
    public function index()
    {
        return view('datamanagement.index');
    }
    public function export()
    {
        return Excel::download(new DataManagementExport, 'data_kemiskinan.xlsx');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        // import data
        $import = Excel::import(new DataManagementImport(), storage_path('app/public/excel/'.$nama_file));

        //remove from server
        Storage::delete($path);

        if ($import) {
            Alert::success('Sukses', 'Data berhasil diimport.')->autoclose(3500);
        } else {
            Alert::error('Error', 'Terjadi kesalahan saat menyimpan data.')->autoclose(3500);
        }
        return redirect('datamanagement');
    }
    public function download()
    {
        $filePath = storage_path('app/public/template_data_kemiskinan.xlsx');
        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ];

        return response()->download($filePath, 'template.xlsx', $headers);
    }



}
