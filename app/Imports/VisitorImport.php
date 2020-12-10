<?php

namespace App\Imports;

use App\Visitor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class VisitorImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Visitor([
            'No' => $row['id'],
            'IP' => $row['ip'],
            'OS' => $row['os'],
            'Browser' => $row['browser'],

        ]);
    }
}
