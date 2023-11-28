<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTanggalkColumn extends Migration
{
    public function up()
    {
        $this->forge->addColumn('keluar', [
            'tanggalk' => [
                'type' => 'VARCHAR',
                'constraint' => '225',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('keluar', 'tanggalk');
    }
}
