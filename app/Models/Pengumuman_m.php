<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengumuman_m extends Model
{
    protected $table = 'pengumuman';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'deskripsi', 'gambar', 'yt','status', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getEnumValues($field)
    {
        $query = $this->db->query("SHOW COLUMNS FROM $this->table LIKE '$field'");
        $row = $query->getRow();
        preg_match('/^enum\((.*)\)$/', $row->Type, $matches);
        $enum = [];
        foreach (explode(',', $matches[1]) as $value) {
            $v = trim($value, "'");
            $enum[] = $v;
        }
        return $enum;
    }
}



