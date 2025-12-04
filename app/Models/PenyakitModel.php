<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyakitModel extends Model
{
    protected $table = 'tbl_penyakit';
    protected $primaryKey = 'id_penyakit';
    protected $allowedFields = ['kode_penyakit', 'nama_penyakit', 'deskripsi_penyakit', 'solusi_penyakit'];
}