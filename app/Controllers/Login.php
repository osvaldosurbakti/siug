<?php

namespace App\Controllers;

use App\Models\DataPelangganModel;

class Login extends BaseController
{
    protected $dataPelangganModel;

    public function __construct()
    {
        $this->dataPelangganModel = new DataPelangganModel();
    }

    public function index()
    {
        return view('home/login');
    }

    public function processLogin()
    {
        $session = session();
        $dataPelangganModel = new DataPelangganModel();

        $phone = $this->request->getPost('nomor_handphone');
        $submittedPassword = $this->request->getPost('password');

        // Periksa apakah login sebagai admin
        if ($phone == 'admin' && $submittedPassword == 'adminrickygadai') {
            $session->set('user_type', 'admin');
            return redirect()->to('/admin');
        }

        // Periksa login sebagai pelanggan
        $pelanggan = $dataPelangganModel->getPelangganByNomorHandphone($phone);

        if ($pelanggan && is_string($submittedPassword) && password_verify($submittedPassword, $pelanggan['password'])) {
            $session->set('user_type', 'pelanggan');
            $session->set('user_id', $pelanggan['id']);
            return redirect()->to('/pelanggan');
        }


        // Jika login gagal, arahkan kembali ke halaman login dengan pesan error
        return redirect()->back()->withInput()->with('error', 'Nomor handphone atau password salah.');
    }
}
