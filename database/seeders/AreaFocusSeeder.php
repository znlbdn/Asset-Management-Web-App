<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaFocusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areaData = [
            [
                'Kode' => 'JKT 3',
                'Nama_Area' => 'JAKARTA 3',
                'Keterangan' => 'Aktif'
            ],
            [
                'Kode' => 'JKT 4',
                'Nama_Area' => 'JAKARTA 4',
                'Keterangan' => 'Aktif'
            ]
        ];

        foreach ($areaData as $key => $val) {
            Area::create($val);
        }
    }
}
