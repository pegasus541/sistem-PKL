<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMitra extends Model
{
    use HasFactory;
    protected $table = 'nilai_mitra';
    protected $fillable = [
        'nama' ,
        'nim' ,
        'tempat_pkl' ,
        'judul_laporan_pkl' ,
        'kesopanan',
        'kedisiplinan',
        'kejujuran',
        'kerjasama',
        'kepemimpinan',
        'tanggapan_saran',
        'kreativitas',
        'daya_nalar',
        'penguasaan_materi',
        'kajian_literatur_alat',
        'pembuatan_hardware',
        'pembuatan_software',
        'instalasi_hardware',
        'instalasi_software',
        'tata_tulis_bahasa',
        'kesesuaian_perencanaan',
        'analisa_data_hasil_karya',
        'kesimpulan',
        'kelengkapan_lampiran',   
    ];
}
