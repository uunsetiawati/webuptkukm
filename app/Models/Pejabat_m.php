<?php

namespace App\Models;

use CodeIgniter\Model;

class Pejabat_m extends Model
{
    protected $table = 'pejabat';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'jabatan', 'detail', 'gambar', 'created_at', 'updated_at'];
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



