<?php

namespace App\Controllers;

//use App\Models\DataPelangganModel;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin');
    }

    public function simpandatapelanggan()
    {
        return view('simpandatapelanggan');
    }

    public function simpandatatransaksi()
    {
        return view('simpandatatransaksi');
    }
    public function updatedatapelanggan()
    {
        return view('updatedatapelanggan');
    }
    public function updatedatatransaksi()
    {
        return view('updatedatatransaksi');
    }
}
