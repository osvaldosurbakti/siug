<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangLelangModel extends Model
{
    protected $table = 'barang_lelang';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_barang', 'harga_barang', 'gambar_barang', 'kelengkapan_barang'];
}
