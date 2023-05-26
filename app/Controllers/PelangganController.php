<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PelangganController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "pelanggan") {
            echo 'Access denied';
            exit;
        }
    }
    public function index()
    {
        return view("pelanggan/dashboard");
    }
}
