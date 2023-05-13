<?php

namespace App\Controllers;

class Pelanggan extends BaseController
{
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
        return view('pelanggan/pelangganlelang');
    }

    public function perjanjiangadai()
    {
        return view('pelanggan/perjanjiangadai');
    }
}
