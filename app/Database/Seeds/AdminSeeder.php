<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'nama_lengkap' => 'Mosyahi Dev',
                'password' => password_hash('admin', PASSWORD_DEFAULT)
            ]
        ];

        $this->db->table('tbl_admin')->insertBatch($data);
    }
}
