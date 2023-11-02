<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiUtsMitra;
use App\Models\NilaiUasMitra;
use App\Models\mahasiswa;
use App\Models\Mitra;
use App\Models\User;

class PenilaianMitraController extends Controller
{
    public function index()
    {   
        $mahasiswas = Mahasiswa::all(); // Ambil data mahasiswa dari database
        $mitras = Mitra::all();
        return view('mitra.mitra_penilaian',
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
            'nilai_uts_mitra' => 'required|integer',
            'mitra' => 'required|string',
            'pembimbing' => 'required|string',
            
        ]);

        $NilaiUtsMitra = NilaiUtsMitra::insert([
            
            'nim' => $request->nim,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'nilai_uts_mitra' => $request->nilai_uts_mitra,
            'mitra' => $request->mitra,
            'pembimbing' => $request->pembimbing,
        ]);
        
        

        return redirect()->route('penilaian_mitra')->with('success', 'Berhasil menambahkan data nilai uts');
    }

    public function storeUas(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nim' => 'required|integer',
            'nama' => 'required|string',
            'kelas' => 'required|string',
            'nilai_uas_mitra' => 'required|integer',
            'mitra' => 'required|string',
            'pembimbing' => 'required|string',
            
        ]);
        
        $NilaiUasMitra = NilaiUasMitra::insert([
            
            'nim' => $request->nim,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'nilai_uas_mitra' => $request->nilai_uas_mitra,
            'mitra' => $request->mitra,
            'pembimbing' => $request->pembimbing,
        ]);
        
        

        return redirect()->route('penilaian_mitra')->with('success', 'Berhasil menambahkan data nilai uas');
    }
}
