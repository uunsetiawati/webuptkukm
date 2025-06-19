<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAksesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'user_id'    => ['type' => 'INT', 'unsigned' => true, 'null' =>true],
            'tipe'       => ['type' => 'INT', 'unsigned' => true, 'null' => true],
        ]);

        $this->forge->addKey('id', true); // primary key
        $this->forge->createTable('akses_user');
    }

    public function down()
    {
        $this->forge->dropTable('akses_user');
    
    }
}
