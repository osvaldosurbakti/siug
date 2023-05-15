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
        $barangLelang = $this->barangLelangModel->findAll();

        $data = [
            'title' => 'Info Barang Lelang',
            'barangLelang' => $barangLelang
        ];

        return view('adminlelang/adminlelang', $data);
    }
}
