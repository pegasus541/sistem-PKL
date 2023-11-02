<?php

namespace App\Imports;
use App\DataDosen;
use App\Models\Dosen;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class DosenImport implements ToModel
{
    
    public function model(array $row)
    {   
        // dd($row);
        return new Dosen([      
            'id'  => $row[0],
            'nip' => strval($row[0]),
            'nama' => $row[1],
            'no_hp' => strval($row[2])
        ]);
    }
}
