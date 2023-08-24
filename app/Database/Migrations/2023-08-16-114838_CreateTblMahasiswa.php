<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblMahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mahasiswa' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
        ]);

        $this->forge->addKey('id_mahasiswa', true);
        $this->forge->createTable('tbl_mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_mahasiswa');
    }
}
