<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUpdateByPelanggan extends Migration
{
    public function up()
    {
        $this->forge->addColumn('pelanggan', [
            'updated_by' => [
            	'type' => 'INT',
                'unsigned' => TRUE,
                'null' => true
            ],
        ]);

        $this->forge->addForeignKey('updated_by', 'users', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropColumn('pelanggan', 'updated_by');
    }
}
