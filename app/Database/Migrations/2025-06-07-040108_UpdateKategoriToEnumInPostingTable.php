<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateKategoriToEnumInPostingTable extends Migration
{
    public function up()
    {
        // Gunakan raw SQL karena ENUM tidak didukung oleh Forge
        $this->db->query("ALTER TABLE posting MODIFY kategori ENUM('Berita', 'Artikel', 'Pengumuman', 'Bincang Jawara', 'Pena Pedia', 'Literasi KUKM', 'Bilik UMKM') NULL");
    }

    public function down()
    {
        // Kembalikan ke VARCHAR jika rollback
        $this->forge->modifyColumn('posting', [
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ]
        ]);
    }
}
