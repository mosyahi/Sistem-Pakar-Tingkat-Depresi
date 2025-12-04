<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblDiagnosaGejala extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_diagnosa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_gejala' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_penyakit' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_cf_mahasiswa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'cf_hasil' => [
                'type' => 'FLOAT',
            ],
            'cf_pakar' => [
                'type' => 'FLOAT',
            ],
        ]);

        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('id_diagnosa', 'tbl_diagnosa', 'id_diagnosa', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('id_gejala', 'tbl_gejala', 'id_gejala', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('id_penyakit', 'tbl_penyakit', 'id_penyakit', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('id_cf_mahasiswa', 'tbl_cf_user', 'id_cf_mahasiswa', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_diagnosa_gejala');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_diagnosa_gejala');
    }
}
