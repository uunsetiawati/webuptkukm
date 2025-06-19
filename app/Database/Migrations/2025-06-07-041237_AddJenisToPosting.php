<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddJenisToPosting extends Migration
{
    public function up()
    {
        // ENUM harus pakai raw query
        $this->db->query("ALTER TABLE posting ADD jenis ENUM('koperasi', 'ukm') AFTER kategori");
    
    }

    public function down()
    {
        // Hapus kolom jika rollback
        $this->forge->dropColumn('posting', 'jenis');
    }
}
