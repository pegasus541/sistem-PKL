<?php

namespace App\Imports;
use App\DataMahasiswa;
use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;


class MahasiswaImport implements ToModel
{
    public function model(array $row)
    {   
        return new Mahasiswa([
            'id' => $row[0],
            'nim' => $row[0],
            'nama' => $row[1],
            'kelas' => $row[2],
        ]);
    }
}
