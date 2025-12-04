<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['username', 'password', 'nama_lengkap'];

    // Fungsi untuk mendapatkan data pengguna berdasarkan username
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}