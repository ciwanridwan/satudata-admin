<?php

namespace App\Exports;

use App\Data;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class DataExport implements FromQuery, Withheadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        
        $data = Data::query()->select('id', 'judul', 'isi', 'file', 'size_files', 'total_download');
        // dd($data);
        return $data;
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
