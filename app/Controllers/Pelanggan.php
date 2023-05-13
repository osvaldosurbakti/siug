<?php

namespace App\Controllers;

class Pelanggan extends BaseController
{
    public function index()
    {
        return view('pelanggan');
    }

    public function datatransaksi()
    {
        return view('datatransaksi');
    }

    public function pelangganlelang()
    {
        return view('pelangganlelang');
    }

    public function perjanjiangadai()
    {
        return view('perjanjiangadai');
    }
}
