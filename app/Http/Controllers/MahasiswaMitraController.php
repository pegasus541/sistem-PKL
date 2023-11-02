<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plotting;

class MahasiswaMitraController extends Controller
{
    public function index()
    {
        $mitraId = auth()->user()->id_mitra;
        $data = Plotting::where('id_mitra', $mitraId)->get();
    
        return view('mitra.mitra_mahasiswa',
        [
            'plottings'=> $data
        ]);
    }

}
