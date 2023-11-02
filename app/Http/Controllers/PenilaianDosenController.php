<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiUtsDosen;
use App\Models\NilaiUasDosen;
use App\Models\mahasiswa;
use App\Models\Mitra;
use App\Models\User;

class PenilaianDosenController extends Controller
{
    public function index()
    {   
        $mahasiswas = Mahasiswa::all(); // Ambil data mahasiswa dari database
        $mitras = Mitra::all();
        return view('dosen.dosen_penilaian',
        [
            'mahasiswas' => $mahasiswas,
            'mitras' => $mitras,
        ]);
    }

    public function storeUts(Request $request)
    {
        
        $request->validate([
            'nim' => 'required|integer',
            'nama' => 'required|string',
            'kelas' => 'required|string',
            'nilai_uts_dosen' => 'required|integer',
            'mitra' => 'required|string',
            'pembimbing' => 'required|string',
            
        ]);

        $NilaiUtsDosen = NilaiUtsDosen::insert([
            
            'nim' => $request->nim,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'nilai_uts_dosen' => $request->nilai_uts_dosen,
            'mitra' => $request->mitra,
            'pembimbing' => $request->pembimbing,
        ]);
        
        

        return redirect()->route('penilaian_dosen')->with('success', 'Berhasil menambahkan data nilai uts');
    }

    public function storeUas(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nim' => 'required|integer',
            'nama' => 'required|string',
            'kelas' => 'required|string',
            'nilai_uas_dosen' => 'required|integer',
            'mitra' => 'required|string',
            'pembimbing' => 'required|string',
            
        ]);
        
        $NilaiUasDosen = NilaiUasDosen::insert([
            
            'nim' => $request->nim,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'nilai_uas_dosen' => $request->nilai_uas_dosen,
            'mitra' => $request->mitra,
            'pembimbing' => $request->pembimbing,
        ]);
        
        

        return redirect()->route('penilaian_dosen')->with('success', 'Berhasil menambahkan data nilai uas');
    }
}
