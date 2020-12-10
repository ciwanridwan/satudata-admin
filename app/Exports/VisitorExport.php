<?php

namespace App\Exports;

use App\Visitor;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class VisitorExport implements FromQuery, WithHeadings, WithColumnFormatting, WithMapping
{
    /**
    * @var Visitor $visitor
    */
    public function query()
    { 
        $data = Visitor::query()->select('id', 'ip', 'os', 'browser', 'created_at');
        return $data;
    } 

    public function map($visitor): array
    {
        return [
            $visitor->id,
            $visitor->ip,
            $visitor->os,
            $visitor->browser,
            Date::dateTimeToExcel($visitor->created_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'IP',
            'OS',
            'Browser',
            'Tanggal Akses',
        ];
    }
}
