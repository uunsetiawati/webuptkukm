<?php
namespace App\Models;

use CodeIgniter\Model;

class User_m extends Model
{
    protected $table = 'tb_user';
    protected $allowedFields = ['email', 'password'];
}
