<?php

namespace App\Controllers;

use App\Models\DataPelangganModel;

class Admin extends BaseController
{
    protected $dataPelangganModel;

    public function __construct()
    {
        $this->dataPelangganModel = new DataPelangganModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Info Barang Lelang',
            'dataPelanggan' => $this->dataPelangganModel->getDataPelanggan()
        ];

        return view('admin/admin', $data);
    }

    public function simpandatapelanggan()
    {
        return view('admin/simpandatapelanggan');
    }

    public function simpandatatransaksi()
    {
        return view('admin/simpandatatransaksi');
    }

    public function updatedatapelanggan()
    {
        return view('admin/updatedatapelanggan');
    }

    public function updatedatatransaksi()
    {
        return view('admin/updatedatatransaksi');
    }
}
