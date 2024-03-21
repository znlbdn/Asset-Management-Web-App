<?php

namespace App\Exports;

use App\Models\Freezer;
use Maatwebsite\Excel\Concerns\FromCollection;

class FreezerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Freezer::orderBy('key_number', 'asc')->get();
        return $data;
    }
}
