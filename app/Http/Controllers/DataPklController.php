<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranPkl;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataPklExport;

class DataPklController extends Controller
{
    public function index()
    {
        $pendaftaranpkls = PendaftaranPkl::all(); 
        
        return view('koordinatorpkl.data_pkl', 
        [
            'pendaftaranpkls'=> $pendaftaranpkls,
            
        ]);
        
    }

    public function export()
    {
        return Excel::download(new DataPklExport(), 'Data PKL.xlsx');
    }

    public function previewSuratPenerimaan($file)
{
    // Tentukan path lengkap ke file Surat Penerimaan
    $filePath = public_path('path_to_surat_penerimaan/' . $file);

    // Buat URL Google Docs Viewer
    $googleDocsUrl = 'https://docs.google.com/viewer?url=' . urlencode(asset($filePath));

    return redirect($googleDocsUrl);
}

}
