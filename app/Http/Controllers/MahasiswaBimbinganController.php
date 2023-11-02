<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plotting;

class MahasiswaBimbinganController extends Controller
{
    public function index()
    {
        
        $dosenId = auth()->user()->id_dosen;
        // dd($userId);
        $data = Plotting::where('id_dosen', $dosenId)->get();
        
        return view('dosen.dosen_mahasiswa',
        [
            'plottings'=> $data
        ]);
    }

}
