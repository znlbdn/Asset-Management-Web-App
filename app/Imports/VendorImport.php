<?php

namespace App\Imports;

use App\Models\Vendor;
use Maatwebsite\Excel\Concerns\ToModel;

class VendorImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Vendor([
            'kode_vendor' => $row[1],
            'nama_vendor' => $row[2],
            'npwp' => $row[3],
            'pic' => $row[4],
            'hp' => $row[5],
            'alamat' => $row[6]
        ]);
    }
}
