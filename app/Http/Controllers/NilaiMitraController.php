<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiUtsMitra;
use App\Models\NilaiUasMitra;

class NilaiMitraController extends Controller
{
    public function index()
    {
        $nilaiutsmitras = NilaiUtsMitra::all();
        $nilaiuasmitras = NilaiUasMitra::all();

        return view('koordinatorpkl.nilai_mitra',
    [
        'nilaiutsmitras' => $nilaiutsmitras,
        'nilaiuasmitras' => $nilaiuasmitras
    ]);
    }
}
