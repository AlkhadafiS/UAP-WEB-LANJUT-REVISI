<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\JenisModel;

class JenisSeeder extends Seeder
{
    public function run()
    {
        $jenisModel = new JenisModel();

        $jenisModel->save([
            'nama_jenis' => 'Minyak Goreng'
        ]);
        $jenisModel->save([
            'nama_jenis' => 'Sabun Mesin Cuci'
        ]);
    
    }
}
