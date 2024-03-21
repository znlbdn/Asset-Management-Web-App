<?php

namespace App\Imports;

use App\Models\Area;
use Maatwebsite\Excel\Concerns\ToModel;

class AreaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Area([
            'Kode' => $row[0],
            'Nama_Area' => $row[1],
            'Keterangan' => $row[2]
        ]);
    }
}
