<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home');
    }

    public function homeLelang()
    {
        return view('homelelang');
    }

    public function login()
    {
        return view('login');
    }
}
