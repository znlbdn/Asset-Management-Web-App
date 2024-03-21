<?php

namespace App\Exports;

use App\Models\Eformpermintaan;
use Maatwebsite\Excel\Concerns\FromCollection;

class RequestExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Eformpermintaan::orderBy('req_no', 'asc')->get();
        return $data;
    }
}
