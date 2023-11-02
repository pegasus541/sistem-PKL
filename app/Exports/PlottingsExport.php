<?php

namespace App\Exports;

use App\Models\Plotting;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class PlottingsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Plotting::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Mahasiswa 1',
            'Mahasiswa 2',
            'Mahasiswa 3',
            'Mahasiswa 4',
            'Mahasiswa 5',
            'Perusahaan',
            'Dosen Pembimbing',
        ];
    }
}
