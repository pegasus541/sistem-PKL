<?php

namespace App\Imports;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class UserMahasiswaImport implements ToModel
{
    public function model(array $row)
    {   
        $email = strval($row[0]) . "@student.polinema.ac.id";
        return new User([
            
            'name' => $row[1],
            'email' => $email,
            'password' => Hash::make($row[0]),
            'role'=>'mahasiswa',
            'id_mahasiswa' => $row[0]
        ]);
    }
}

?>