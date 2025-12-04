<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblFaq extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_faq' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'pertanyaan' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'jawaban' => [
                'type' => 'TEXT',
            ],
        ]);

        $this->forge->addKey('id_faq', true);
        $this->forge->createTable('tbl_faq');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_faq');
    }
}
