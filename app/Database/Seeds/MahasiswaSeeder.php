<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email' => 'mochsyarifhidayat24@gmail.com',
                'nama_lengkap' => 'Moch Syarif Hidayat',
                'password' => password_hash('User.123', PASSWORD_DEFAULT)
            ]
        ];

        $this->db->table('tbl_mahasiswa')->insertBatch($data);
    }
}
