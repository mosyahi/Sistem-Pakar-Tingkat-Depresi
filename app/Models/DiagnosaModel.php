<?php

namespace App\Models;

use CodeIgniter\Model;

class DiagnosaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_diagnosa';
    protected $primaryKey       = 'id_diagnosa';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_penyakit',
        'id_diagnosa_gejala',
        'nama_mahasiswa',
        'jk',
        'nim',
        'prodi',
        'semester',
        'tgl_diagnosa',
        'cf_akhir',
        'presentase',
        'p_1',
        'p_2',
        'p_3',
        'p_4',
        'p_5'
    ];

    public function getLaporan()
    {
        return $this->select('tbl_diagnosa.*, tbl_penyakit.nama_penyakit')
        ->join('tbl_penyakit', 'tbl_penyakit.id_penyakit = tbl_diagnosa.id_penyakit', 'left')
        ->findAll();
    }

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}