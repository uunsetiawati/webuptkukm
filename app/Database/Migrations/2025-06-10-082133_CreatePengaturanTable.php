<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengaturanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'sejarah'    => ['type' => 'TEXT', 'null' => true],
            'visi'       => ['type' => 'TEXT', 'null' => true],
            'misi'       => ['type' => 'TEXT', 'null' => true],
            'gambar'     => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],   
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true); // primary key
        $this->forge->createTable('pengaturan');
    }

    public function down()
    {
        $this->forge->dropTable('pengaturan');
    }
}
