<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersFocusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Zainal',
                'email' => 'zainal.abidin@sreeyasewu.com',
                'password' => bcrypt('123456'),
                'role' => 'ssi',
                'company' => 'PT Sreeya Sewu Indonesia, Tbk.'
            ],
            [
                'name' => 'Abidin',
                'email' => 'zainal.abidin@belfoods.com',
                'password' => bcrypt('123456'),
                'role' => 'bfi',
                'company' => 'PT Belfoods Indonesia'
            ]
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
