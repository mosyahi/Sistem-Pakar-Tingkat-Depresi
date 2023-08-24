<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblResetPassword extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_reset_pass' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_mahasiswa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'expires_at' => [
                'type' => 'DATETIME',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_reset_pass', true);
        $this->forge->addForeignKey('id_mahasiswa', 'tbl_mahasiswa', 'id_mahasiswa', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_reset_password');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_reset_password');
    }
}
