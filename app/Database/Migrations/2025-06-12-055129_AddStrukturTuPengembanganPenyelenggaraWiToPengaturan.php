<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStrukturTuPengembanganPenyelenggaraWiToPengaturan extends Migration
{
    public function up()
    {
        $this->db->query("
            ALTER TABLE pengaturan 
            ADD struktur VARCHAR(255) NULL AFTER misi,
            ADD tu TEXT NULL AFTER struktur,
            ADD pengembangan TEXT NULL AFTER tu,
            ADD penyelenggara TEXT NULL AFTER pengembangan,
            ADD wi TEXT NULL AFTER penyelenggara
        ");
    }

    public function down()
    {
        $this->forge->dropColumn('pengaturan', ['struktur', 'tu', 'pengembangan', 'penyelenggara', 'wi']);
    }
}
