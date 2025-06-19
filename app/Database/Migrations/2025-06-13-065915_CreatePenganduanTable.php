<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenganduanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'pesan'      => ['type' => 'TEXT', 'null' => true],
            'nama'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'email'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'subject'    => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],   
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true); // primary key
        $this->forge->createTable('pengaduan');
    }

    public function down()
    {
        $this->forge->dropTable('pengaduan');
    }
}
