<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTanggalColumn extends Migration
{
    public function up()
    {
        $this->forge->addColumn('transaksi', [
            'tanggal' => [
                'type' => 'VARCHAR',
                'constraint' => '225',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('transaksi', 'tanggal');
    }
}
