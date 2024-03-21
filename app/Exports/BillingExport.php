<?php

namespace App\Exports;

use App\Models\Eformbilling;
use Maatwebsite\Excel\Concerns\FromCollection;

class BillingExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Eformbilling::orderBy('bil_no', 'asc')->get();
        return $data;
    }
}
