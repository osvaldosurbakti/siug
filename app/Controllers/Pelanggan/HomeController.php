<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;

class HomeController extends BaseController
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
