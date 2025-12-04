<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CFSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['Tidak Sama Sekali', 0],
            ['Tidak Yakin', 0.2],
            ['Mungkin', 0.4],
            ['Kemungkinan Besar', 0.6],
            ['Pasti', 0.8],
            ['Sangat Pasti', 1],
        ];

        $builder = $this->db->table('tbl_cf_user');
        foreach ($data as $row) {
            $builder->insert([
                'nama_nilai' => $row[0],
                'cf' => $row[1],
            ]);
        }
    }
}
