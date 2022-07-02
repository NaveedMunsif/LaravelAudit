<?php

namespace App\Imports;

use App\Models\MisCsv;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MisImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new MisCsv([
            //

            'amount'     => $row['amount'],
            'cheque_no'    => $row['cheque_no'],


        ]);

    }
}
