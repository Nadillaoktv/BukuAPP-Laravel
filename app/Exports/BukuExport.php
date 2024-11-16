<?php

namespace App\Exports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class BukuExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Buku::all();
    }

    public function headings(): array
    {
        // membuat th
        return [
            "ID",
            "Judul",
            "Genre",
            "Penulis",
            "Penerbit",
        ];
    }

}
