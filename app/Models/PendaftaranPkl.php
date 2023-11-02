<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranPkl extends Model
{
    use HasFactory;
    
    
    protected $fillable  = [
        'jumlah_anggota',
        'identitas_mahasiswa_1',
        'identitas_mahasiswa_2',
        'identitas_mahasiswa_3',
        'identitas_mahasiswa_4',
        'identitas_mahasiswa_5',
        'nama_perusahaan_tempat_pkl',
        'durasi_pkl',
        'tanggal_mulai_pkl',
        'tanggal_selesai_pkl',
        'kontak_perusahaan',
        'surat_penerimaan',
        'id_mitra',
    ];
    public $timestamps = true;
    
}
