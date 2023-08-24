<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblDiagnosa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_diagnosa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_penyakit' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'nama_mahasiswa' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'jk' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'prodi' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],
            'semester' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'tgl_diagnosa' => [
                'type' => 'DATE',
            ],
            'cf_akhir' => [
                'type' => 'FLOAT',
            ],
            'presentase' => [
                'type' => 'FLOAT',
            ],
            'p_1' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'p_2' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'p_3' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'p_4' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'p_5' => [
                'type' => 'TEXT',
            ],
        ]);

        $this->forge->addKey('id_diagnosa', true);
        // $this->forge->addForeignKey('id_penyakit', 'tbl_penyakit', 'id_penyakit', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_diagnosa');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_diagnosa');
    }
}
