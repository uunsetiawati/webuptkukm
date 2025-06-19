<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengumuman_m extends Model
{
    protected $table = 'pengumuman';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'deskripsi', 'gambar', 'yt','status', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    
}



