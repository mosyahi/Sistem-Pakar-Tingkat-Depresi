<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'tbl_mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    protected $allowedFields = ['email', 'password', 'nama_lengkap'];

    // Fungsi untuk mendapatkan data pengguna berdasarkan username
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}