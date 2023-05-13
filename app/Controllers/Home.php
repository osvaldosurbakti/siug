<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home/home');
    }

    public function homeLelang()
    {
        return view('home/homelelang');
    }

    public function login()
    {
        return view('home/login');
    }
}
