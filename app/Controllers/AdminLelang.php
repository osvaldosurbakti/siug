<?php

namespace App\Controllers;

use App\Models\BarangLelangModel;

class Adminlelang extends BaseController
{

    public function index()
    {

        return view('adminlelang/adminlelang');
    }

    public function tambahbaranglelang()
    {

        return view('adminlelang/tambahbaranglelang');
    }
    public function updatebaranglelang()
    {

        return view('adminlelang/updatebaranglelang');
    }
}
