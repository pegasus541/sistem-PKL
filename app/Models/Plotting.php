<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plotting extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'mahasiswa_1',
        'mahasiswa_2',
        'mahasiswa_3',
        'mahasiswa_4',
        'mahasiswa_5',
        'perusahaan',
        'dosen_pembimbing',
        'id_dosen',
        'id_pendaftaran',
        'id_mitra'    
    ];
    
}
