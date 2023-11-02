<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiUtsDosen;
use App\Models\NilaiUasDosen;
use App\Models\NilaiUtsMitra;
use App\Models\NilaiUasMitra;

class NilaiAllController extends Controller
{


    public function index()
    {
        return view('koordinatorpkl.nilai_all');
    }

}

// private function konversiKeHuruf($nilai)
// {
//     if ($nilai > 80) {
//         return 'A';
//     } elseif ($nilai > 73) {
//         return 'B+';
//     } elseif ($nilai > 65) {
//         return 'B';
//     } elseif ($nilai > 60) {
//         return 'C+';
//     } elseif ($nilai > 50) {
//         return 'C';
//     } elseif ($nilai > 39) {
//         return 'D';
//     } else {
//         return 'E';
//     }
// }

    

