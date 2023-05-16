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
        //$barangLelang = $this->barangLelangModel->findAll();

        $data = [
            'title' => 'Info Barang Lelang',
            'barangLelang' => $this->barangLelangModel->getBarangLelang()
        ];

        return view('adminlelang/adminlelang', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Cek Dulu',
            'baranglelang' => $this->barangLelangModel->getBarangLelang($id)
        ];
        return view('adminlelang/updatebaranglelang', $data);
    }

    public function updatebaranglelang()
    {
        return view('adminlelang/updatebaranglelang');
    }

    public function create($id)
    {
        $data = [
            'title' => 'Cek Dulu Buat',
        ];
        return view('adminlelang/tambahbaranglelang', $data);
    }
}
