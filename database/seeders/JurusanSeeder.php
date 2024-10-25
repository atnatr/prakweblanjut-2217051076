<?php

namespace Database\Seeders;

use App\Models\JurusanModel;
use App\Models\Fakultas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['nama_jurusan' => 'Ilmu Komputer', 'fakultas' => 'MIPA'],
            ['nama_jurusan' => 'Matematika', 'fakultas' => 'MIPA'],
            ['nama_jurusan' => 'Fisika', 'fakultas' => 'MIPA'],
            ['nama_jurusan' => 'Kimia', 'fakultas' => 'MIPA'],
            ['nama_jurusan' => 'Pendidikan Guru', 'fakultas' => 'KIP'],
            ['nama_jurusan' => 'Ilmu Hukum', 'fakultas' => 'HUKUM'],
            ['nama_jurusan' => 'Teknik Informatika', 'fakultas' => 'TEKNIK'],
            ['nama_jurusan' => 'Teknik Sipil', 'fakultas' => 'TEKNIK'],
            ['nama_jurusan' => 'Psikologi', 'fakultas' => 'KG'],
            ['nama_jurusan' => 'Ilmu Komunikasi', 'fakultas' => 'ISIP'],
        ];

        foreach ($data as $jurusan) {
            $fakultas = Fakultas::where('nama_fakultas', $jurusan['fakultas'])->first();
            if ($fakultas) {
                JurusanModel::create([
                    'nama_jurusan' => $jurusan['nama_jurusan'],
                    'fakultas_id' => $fakultas->id,
                ]);
            }
        }
    }
}
