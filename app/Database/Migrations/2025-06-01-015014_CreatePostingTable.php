<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostingTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'judul'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug'       => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'isi'        => ['type' => 'TEXT'],
            'kategori'   => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'thumbnail'  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'penulis'    => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'status'     => ['type' => 'ENUM', 'constraint' => ['draft', 'publish'], 'default' => 'draft'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('posting');
    }

    public function down()
    {
        $this->forge->dropTable('posting');
    }
}
