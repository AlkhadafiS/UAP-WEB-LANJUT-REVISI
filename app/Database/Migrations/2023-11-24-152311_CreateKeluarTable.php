<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKeluarTable extends Migration
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
                'constraint'        => 50,
            ],

            'keluar'        => [
                'type'              => 'INT',
                'constraint'        => 10,
            ],
            'id_jenis'          => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
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
        $this->forge->addForeignKey('id_jenis','jenis','id');
        $this->forge->createTable('keluar');
    }

    public function down()
    {
        $this->forge->dropTable('keluar',true);
    }
}
