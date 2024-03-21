<?php

namespace App\Imports;

use App\Models\Outlet;
use Maatwebsite\Excel\Concerns\ToModel;

class OutletImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Outlet([
            'custid' => $row[0],
            'custname' => $row[1],
            'Tipe' => $row[2],
            'address' => $row[3],
            'latitude' => $row[4],
            'longitude' => $row[5],
            'status' => $row[6]
        ]);
    }
}
