<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUpdateByBarangLelang extends Migration
{
    public function up()
    {
        $this->forge->addColumn('barang_lelang', [
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
        $this->forge->dropColumn('barang_lelang', 'updated_by');
    }
}
