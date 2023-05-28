<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUpdateByUser extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'updated_by' => [
            	'type' => 'INT',
                'unsigned' => TRUE,
                'null' => true
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'updated_by');
    }
}
