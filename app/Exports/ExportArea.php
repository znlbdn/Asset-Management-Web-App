<?php

namespace App\Exports;

use App\Models\Area;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportArea implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Area::orderBy('Kode', 'asc')->get();
        return $data;
    }
}
