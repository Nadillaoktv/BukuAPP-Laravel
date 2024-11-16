<?php

namespace App\Exports;

use App\Models\Pembaca;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PembacaExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pembaca::all();
    }

    public function headings(): array
    {
        // membuat th
        return [
            "ID",
            "Nama",
            "Nis",
            "Status"
        ];
    }

}
