<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratPenerimaanMitraController extends Controller
{
    public function index()
    {
        return view('mitra.surat_penerimaan');
    }
}
