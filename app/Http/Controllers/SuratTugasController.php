<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranPkl;
use App\Models\Dosen;
use App\Models\Mitra;
use App\Models\Plotting;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PlottingsExport;

class SuratTugasController extends Controller
{
    public function index()
    {
        $pendaftaranpkls = PendaftaranPkl::all();
        $dosens = dosen::all();
        $plottings = Plotting::all();
        $mitras = mitra::all();
        return view('koordinatorpkl.surat_tugas',
        [
            'pendaftaranpkls'=> $pendaftaranpkls,
            'dosens'=> $dosens,
            'mitras'=> $mitras,
            'plottings'=> $plottings
        ]);
    }
    public function store(Request $request)        
     {  
        

        $mahasiswa_1 = $request->input('mahasiswa_1');
        $mahasiswa_2 = $request->input('mahasiswa_2');
        $mahasiswa_3 = $request->input('mahasiswa_3');
        $mahasiswa_4 = $request->input('mahasiswa_4');
        $mahasiswa_5 = $request->input('mahasiswa_5');
        $perusahaan = $request->input('perusahaan');
        $dosen_pembimbing = $request->input('dosen_pembimbing');        
        $pendaftaranId = $request->input('id_pendaftaran');
        $dosenId = $request->input('id_dosen');
        $mitraId = $request->input('id_mitra');
    
        $plotting = new Plotting([
            'mahasiswa_1' => $mahasiswa_1,
            'mahasiswa_2' => $mahasiswa_2,
            'mahasiswa_3' => $mahasiswa_3,
            'mahasiswa_4' => $mahasiswa_4,
            'mahasiswa_5' => $mahasiswa_5,
            'perusahaan' => $perusahaan,
            'dosen_pembimbing' => $dosen_pembimbing,
            'id_pendaftaran' => $pendaftaranId,
            'id_dosen' => $dosenId,
            'id_mitra' => $mitraId
                       
        ]);
        $plotting->save();
    
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function export()
    {
        return Excel::download(new PlottingsExport(), 'plottings.xlsx');
    }
}
