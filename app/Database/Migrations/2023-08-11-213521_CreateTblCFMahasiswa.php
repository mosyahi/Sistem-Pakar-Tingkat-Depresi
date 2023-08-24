<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblCFMahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_cf_mahasiswa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_nilai' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'cf' => [
                'type' => 'FLOAT',
            ],
        ]);

        $this->forge->addKey('id_cf_mahasiswa', true);
        $this->forge->createTable('tbl_cf_user');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_cf_user');
    }
}
