<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPelangganModel extends Model
{
    protected $table      = 'data_pelanggan';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'nik', 'alamat', 'nomor_handphone', 'tanggal_gadai', 'nama_barang', 'kelengkapan_barang', 'password', 'foto_ktp', 'jumlah_pinjaman', 'potong_atas', 'jumlah_diterima', 'jumlah_dibayarkan', 'batas_pembayaran', 'status_transaksi'];


    public function getDataPelanggan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
