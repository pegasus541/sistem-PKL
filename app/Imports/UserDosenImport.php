<?php

namespace App\Imports;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;


class UserDosenImport implements ToModel
{
    
    public function model(array $row)
    {   
        // dd(gettype($row[2]));
        // dd(strval($row[2]));
        $name = $row[1];
        $nip = strval($row[0]);
        $email = $nip . "@dosen.polinema.ac.id";

        return new User([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($nip),
            'role'=>'dosen',
            'id_dosen' =>$row[0]
        ]);
    }
}
