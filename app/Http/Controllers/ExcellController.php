<?php

namespace App\Http\Controllers;

use App\Visitor;
use App\Exports\DataExport;
use Illuminate\Http\Request;
use App\Exports\VisitorExport;
use App\Exports\PublikasiExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExcellController extends Controller
{
    public function exportVisitor()
    {
        // return (new VisitorExport)->download('invoices.xlsx');
        return Excel::download(new VisitorExport, 'Total Pengunjung Website Satudata.xlsx');
    }

    public function exportData()
    {
        return Excel::download(new DataExport, 'Total Data Didownload.xlsx');
    }

    public function exportPublikasi()
    {
        return Excel::download(new PublikasiExport, 'Total Publikasi Di Download.xlsx');
    }
}
