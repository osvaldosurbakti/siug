<?php

namespace App\Controllers;

//use App\Models\DataPelangganModel;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/admin');
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
