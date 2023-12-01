<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMerkTable extends Migration
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
            'nama_merk'        => [
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
        $this->forge->addKey('id',true,true);
        $this->forge->addUniqueKey('nama_merk');
        $this->forge->createTable('merk');
    }

    public function down()
    {
        $this->forge->dropTable('merk',true);
    }
}