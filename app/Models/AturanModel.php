<?php

namespace App\Models;

use CodeIgniter\Model;

class AturanModel extends Model
{
    protected $table = 'tbl_aturan';
    protected $primaryKey = 'id_aturan';
    protected $allowedFields = ['id_penyakit', 'id_gejala', 'mb', 'md', 'cf'];

    public function penyakit()
    {
        return $this->belongsTo(PenyakitModel::class, 'id_penyakit', 'id_penyakit');
    }

    public function gejala()
    {
        return $this->belongsTo(GejalaModel::class, 'id_gejala', 'id_gejala');
    }

}