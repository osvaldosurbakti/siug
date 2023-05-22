<?php

namespace App\Controllers;


use App\Models\BarangLelangModel;


class Home extends BaseController
{
    protected $barangLelangModel;

    public function __construct()
    {

        $this->barangLelangModel = new BarangLelangModel();
    }
    public function index()
    {
        return view('home/home');
    }

    public function homeLelang()
    {
        $data = [
            'title' => 'Info Barang Lelang',
            'barangLelang' => $this->barangLelangModel->getBarangLelang()
        ];
        return view('home/homelelang', $data);
    }
}
