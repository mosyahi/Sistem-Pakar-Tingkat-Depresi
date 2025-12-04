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
                'nama_lengkap' => 'Mosyahi Izuku',
                'password' => password_hash('admin', PASSWORD_DEFAULT)
            ],
            [
                'username' => 'admin2',
                'nama_lengkap' => 'Mosyahi Izuku 2',
                'password' => password_hash('admin', PASSWORD_DEFAULT)
            ],
            [
                'username' => 'admin3',
                'nama_lengkap' => 'Mosyahi Izuku 3',
                'password' => password_hash('admin', PASSWORD_DEFAULT)
            ],
            [
                'username' => 'admin4',
                'nama_lengkap' => 'Mosyahi Izuku 4',
                'password' => password_hash('admin', PASSWORD_DEFAULT)
            ]
        ];

        $this->db->table('tbl_admin')->insertBatch($data);
    }
}
