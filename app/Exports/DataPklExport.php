<?php

namespace App\Exports;
use App\Models\PendaftaranPkl;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataPklExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PendaftaranPkl::all();
    }

    public function headings(): array
    {
        return [
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
        ];
    }
}
