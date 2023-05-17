<?php

namespace App\Controllers;

use App\Models\BarangLelangModel;

class Pelanggan extends BaseController
{
    protected $barangLelangModel;

    public function __construct()
    {

        $this->barangLelangModel = new BarangLelangModel();
    }

    public function index()
    {

        return view('pelanggan/pelanggan');
    }

    public function datatransaksi()
    {
        return view('pelanggan/datatransaksi');
    }

    public function pelangganlelang()
    {
        $data = [
            'title' => 'Info Barang Lelang',
            'barangLelang' => $this->barangLelangModel->getBarangLelang()
        ];

        return view('pelanggan/pelangganlelang', $data);
    }

    public function perjanjiangadai()
    {
        return view('pelanggan/perjanjiangadai');
    }

    public function tebusbarang()
    {
        return view('pelanggan/tebusbarang');
    }
}
