<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiUtsDosen extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nim',
        'nama',
        'kelas',
        'nilai_uts_dosen',
        'mitra',
        'pembimbing',
        

    ];
}
