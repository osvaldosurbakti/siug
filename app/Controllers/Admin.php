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

    public function updatedatapelanggan($id)
    {
        $datapelanggan = $this->dataPelangganModel->getDataPelanggan($id);

        if (empty($datapelanggan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data pelanggan ' . $id . ' tidak ditemukan.');
        }
        $data = [
            'title' => 'Info Data Pelanggan',
            'dataPelanggan' => $datapelanggan
        ];

        return view('admin/updatedatapelanggan', $data);
    }


    public function updatedatatransaksi($id)
    {
        $datapelanggan = $this->dataPelangganModel->getDataPelanggan($id);

        if (empty($datapelanggan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data pelanggan ' . $id . ' tidak ditemukan.');
        }
        $data = [
            'title' => 'Info Data Pelanggan',
            'dataPelanggan' => $datapelanggan
        ];

        return view('admin/updatedatatransaksi', $data);
    }
}
