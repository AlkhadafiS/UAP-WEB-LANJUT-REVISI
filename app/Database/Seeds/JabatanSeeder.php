<?php

namespace App\Database\Seeds;

use App\Models\JabatanModel;
use CodeIgniter\Database\Seeder;

class JabatanSeeder extends Seeder
{
    public function run()
    {
        $jabatanModel = new JabatanModel();

        $jabatanModel->save([
            'nama_jabatan' => 'Admin'
        ]);
        $jabatanModel->save([
            'nama_jabatan' => 'Atasan'
        ]);
        $jabatanModel->save([
            'nama_jabatan' => 'Penjaga Gudang'
        ]);
        $jabatanModel->save([
            'nama_jabatan' => 'Kru Minimarket'
        ]);
    }
}