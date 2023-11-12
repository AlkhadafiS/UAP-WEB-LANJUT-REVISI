<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'nama_jenis'        => [
                'type'              => 'VARCHAR',
                'constraint'        => 30,
            ],
            'created_at'        => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'updated_at'        => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'deleted_at'        => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
        ]);
        $this->forge->addKey('id', true,true);
        $this->forge->createTable('jenis');
    }

    public function down()
    {
        $this->forge->dropTable('jenis',true);
    }
}