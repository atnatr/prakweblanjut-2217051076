<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'MIPA',
            'KIP',
            'HUKUM',
            'TEKNIK',
            'KG',
            'ISIP',
        ];

        foreach ($data as $fakultas){
            Fakultas::create([
                'nama_fakultas' => $fakultas
            ]);
        }
    }
}
