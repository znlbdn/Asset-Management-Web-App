<?php

namespace App\Imports;

use App\Models\Freezer;
use Maatwebsite\Excel\Concerns\ToModel;

class FreezerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Freezer([
            'key_number' => $row[0],
            'Freezer_Owner' => $row[1],
            'Supplier' => $row[2],
            'Brand' => $row[3],
            'BatchPO' => $row[4],
            'Type' => $row[5],
            'BarcodeFANumber' => $row[6]
        ]);
    }
}
