<?php

namespace App\Controllers;

use App\Models\BarangLelangModel;

class Adminlelang extends BaseController
{

    public function index()
    {

        return view('adminlelang');
    }

    public function tambahbaranglelang()
    {

        return view('tambahbaranglelang');
    }
}
