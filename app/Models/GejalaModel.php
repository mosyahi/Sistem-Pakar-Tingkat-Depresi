<?php

namespace App\Models;

use CodeIgniter\Model;

class GejalaModel extends Model
{
    protected $table = 'tbl_gejala';
    protected $primaryKey = 'id_gejala';
    protected $allowedFields = ['kode_gejala', 'nama_gejala'];
}