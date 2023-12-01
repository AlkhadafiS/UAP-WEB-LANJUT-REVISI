<?php

namespace App\Database\Seeds;

// use App\Models\MerkModel;
use App\Models\MerkModel;
use CodeIgniter\Database\Seeder;

class MerkSeeder extends Seeder
{
    public function run()
    {
        $merkModel = new MerkModel();

        $merkModel->save([
            'nama_merk' => 'Sania'
        ]);

        $merkModel->save([
            'nama_merk' => 'Bimoli'
        ]);

        $merkModel->save([
            'nama_merk' => 'Rinso'
        ]);

        $merkModel->save([
            'nama_merk' => 'Sayang'
        ]);
    }
}