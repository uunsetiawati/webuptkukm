<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDetailToPejabat extends Migration
{
    public function up()
    {
        $this->db->query("ALTER TABLE pejabat ADD detail VARCHAR(100) NULL AFTER jabatan");

    }

    public function down()
    {
        $this->forge->dropColumn('pejabat', 'detail');
    }
}
