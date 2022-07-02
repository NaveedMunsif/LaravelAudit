<?php

namespace App\Exports;

use App\Models\MisCsv;
use Maatwebsite\Excel\Concerns\FromCollection;

class MisExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MisCsv::Select('amount','cheque_no')->get();
    }
}
