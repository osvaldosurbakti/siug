<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangGadai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'pelanggan_id' => [
                'type' => 'INT',
                'unsigned' => TRUE
            ],
            'nama_barang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'kelengkapan_barang' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'catatan_barang' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tanggal_gadai' => [
                'type' => 'datetime',
                'null' => TRUE
            ],
            'batas_pembayaran' => [
                'type' => 'datetime',
                'null' => TRUE
            ],
            'nominal_pinjaman' => [
                'type' => 'DECIMAL',
                'constraint' => '12,2',
            ],
            'potong_atas' => [
                'type'       => 'ENUM',
        		'constraint' => ['ya', 'tidak'],
                'null' => true,
            ],
            'nominal_diterima' => [
                'type' => 'DECIMAL',
                'constraint' => '12,2',
            ],
            'nominal_dibayarkan' => [
                'type' => 'DECIMAL',
                'constraint' => '12,2',
            ],
            'status_transaksi' => [
                'type'       => 'ENUM',
        		'constraint' => ['gadai', 'selesai', 'barang dilelang'],
                'null' => true,
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
        $this->forge->addForeignKey('pelanggan_id', 'pelanggan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('barang_gadai');
    }

    public function down()
    {
        $this->forge->dropTable('barang_gadai');
    }
}
