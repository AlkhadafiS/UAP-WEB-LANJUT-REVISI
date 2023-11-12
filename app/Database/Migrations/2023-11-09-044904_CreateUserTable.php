<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
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
            'nama_user'        => [
                'type'              => 'VARCHAR',
                'constraint'        => 50,
            ],
            'password'        => [
                'type'              => 'VARCHAR',
                'constraint'        => 50,
            ],
            'id_jabatan'          => [
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
        $this->forge->addForeignKey('id_jabatan','jabatan','id');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user',true);
    }
}