<?php

namespace App\Http\Controllers;

use App\Data;
use App\Visitor;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Exports\DataExport;
use Illuminate\Http\Request;
use App\Exports\VisitorExport;
use App\Exports\PublikasiExport;
use App\Publikasi;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExcellController extends Controller
{
    // public function exportVisitor()
    // { 
    //     return Excel::download(new VisitorExport, 'Total Pengunjung Website Satudata.xlsx');
    // }

    // public function exportData()
    // {
    //     return Excel::download(new DataExport, 'Total Data Didownload.xlsx');
    // }

    // public function exportPublikasi()
    // {
    //     return Excel::download(new PublikasiExport, 'Total Publikasi Di Download.xlsx');
    // }

    public function exportVisitor()
    {
        function visitorGenerator() {
            foreach (Visitor::cursor() as $visitor) {
                yield $visitor;
            }
        }
        
        // Export consumes only a few MB, even with 10M+ rows.
        return (new FastExcel(visitorGenerator()))->download('Total Pengunjung Website.xlsx', function ($visits){
            return [
                "No" => $visits->id,
                "Ip" => $visits->ip,
                "Os" => $visits->os,
                "Browser" => $visits->browser
            ];
        });
    }

    public function exportData()
    {
        function dataGenerators() {
            foreach (Data::cursor() as $data) {
                yield $data;
            }
        }
        
        // Export consumes only a few MB, even with 10M+ rows.
        return (new FastExcel(dataGenerators()))->download('Total Data Didownload.xlsx', function ($datas){
            return [
                "No" => $datas->id,
                "Judul" => $datas->judul,
                "Isi" => $datas->isi,
                "File" => $datas->file,
                "Ukuran File" => $datas->size_files,
                "Total Download" => $datas->total_download,
            ];
        });
    }

    public function exportPublikasi()
    {
        function publikasiGenerators() {
            foreach (Publikasi::cursor() as $publikasi) {
                yield $publikasi;
            }
        }
        
        // Export consumes only a few MB, even with 10M+ rows.
        return (new FastExcel(publikasiGenerators()))->download('Total Publikasi Didownload.xlsx', function ($publication){
            return [
                "No" => $publication->id,
                "Judul" => $publication->judul,
                "Isi" => $publication->isi,
                "File" => $publication->file,
                "Ukuran File" => $publication->size_file,
                "Total Download" => $publication->total_download,
            ];
        });
    }

}

