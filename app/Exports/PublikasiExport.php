<?php

namespace App\Exports;

use App\Publikasi;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class PublikasiExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Publikasi::query()->select('id', 'judul', 'isi', 'file', 'size_file', 'total_download');
    }

    public function headings(): array
    {
        return [
            'No',
            'Judul',
            'Isi',
            'File',
            'Ukuran File',
            'Total_Download'
        ];
    }
}
