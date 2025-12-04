<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblOtp extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'otp' => [
                'type' => 'VARCHAR',
                'constraint' => '6',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_otp');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_otp');
    }
}
