<?php

namespace App\Controllers;


use App\Models\BarangLelangModel;

class Adminlelang extends BaseController
{

    protected $barangLelangModel;

    public function __construct()

    {
        $this->barangLelangModel = new BarangLelangModel();
    }

    public function index()
    {
        $barang_lelang = $this->barangLelangModel->findAll();

        $data = [
            'title' => 'Form Tambah Barang Lelang',
            'barang_lelang' => $barang_lelang
        ];

        return view('adminlelang', $data);
    }

    public function tambahbaranglelang()
    {
    }
}
