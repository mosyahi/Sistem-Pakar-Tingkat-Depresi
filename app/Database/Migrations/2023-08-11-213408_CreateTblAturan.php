<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblAturan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_aturan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
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
            'mb' => [
                'type' => 'FLOAT',
            ],
            'md' => [
                'type' => 'FLOAT',
            ],
            'cf' => [
                'type' => 'FLOAT',
            ],
        ]);

        $this->forge->addPrimaryKey('id_aturan');
        $this->forge->addForeignKey('id_penyakit', 'tbl_penyakit', 'id_penyakit', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_gejala', 'tbl_gejala', 'id_gejala', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_aturan');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_aturan');
    }
}
