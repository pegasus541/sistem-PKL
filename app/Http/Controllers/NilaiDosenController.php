<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiUtsDosen;
use App\Models\NilaiUasDosen;

class NilaiDosenController extends Controller
{
    public function index()
    {
        $nilaiutsdosens = NilaiUtsDosen::all();
        $nilaiuasdosens = NilaiUasDosen::all();

        return view('koordinatorpkl.nilai_dosen',
    [
        'nilaiutsdosens' => $nilaiutsdosens,
        'nilaiuasdosens' => $nilaiuasdosens
    ]);
    }

    
}
