<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKeteranganToAksesUser extends Migration
{
    public function up()
    {
         // ENUM harus pakai raw query
        $this->db->query("ALTER TABLE akses_user ADD keterangan ENUM('super admin', 'admin', 'admin berita', 'admin bincang jawara', 'admin pena pedia', 'admin literai kukm', 'admin bilik umkm') AFTER tipe");
    }

    public function down()
    {
        // Hapus kolom jika rollback
        $this->forge->dropColumn('slider', 'keterangan');
    }
}
