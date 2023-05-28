<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangLelang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nama_barang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'deskripsi_barang' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'foto_barang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'harga_barang' => [
                'type' => 'DECIMAL',
                'constraint' => '12,2',
            ],
            'status_barang' => [
                'type'       => 'ENUM',
        		'constraint' => ['lelang', 'terjual'],
                'null' => true,
            ],
            'tanggal_terjual' => [
                'type' => 'datetime',
                'null' => TRUE
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => TRUE
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => TRUE
            ],
            'deleted_at' => [
            	'type' => 'DATETIME', 
            	'null' => true
            ]
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('barang_lelang');
    }

    public function down()
    {
        $this->forge->dropTable('barang_lelang');
    }
}
