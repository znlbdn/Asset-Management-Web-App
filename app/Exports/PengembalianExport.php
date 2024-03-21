<?php

namespace App\Exports;

use App\Models\Eformpengembalian;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengembalianExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Eformpengembalian::orderBy('ret_no', 'asc')->get();
        return $data;
    }
}
