<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePejabatTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nama'       => ['type' => 'TEXT', 'null' => true],
            'jabatan'    => ['type' => 'ENUM', 'constraint' => ['kepala', 'kasi'], 'default' => 'kasi'],
            'gambar'     => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],   
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true); // primary key
        $this->forge->createTable('pejabat');
    }

    public function down()
    {
        $this->forge->dropTable('pejabat');
    }
}
