<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Pelanggan;

class PelangganController extends BaseController
{
    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->user = new User();
        $this->pelanggan = new Pelanggan();

        if (session()->get('role') != "admin") {
            echo 'Access denied';
            exit;
        }
    }
    
    public function list()
    {
        $data['users'] = $this->pelanggan->AllData();
        return view('admin/pelanggan_list', $data);
    }

    public function add()
    {
        return view('admin/pelanggan_add');
    }

    public function store()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'numeric' => 'NIK harus menggunakan angka'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'no_telp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'numeric' => 'NIK harus menggunakan angka'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => 'Email Harus Valid',
                    'is_unique' => 'Email sudah digunakan'
                ]
            ],
            'foto_ktp' => [
                'rules' => 'uploaded[foto_ktp]|mime_in[foto_ktp,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto_ktp,4056]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 4 MB'
                ]
 
            ]
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        
        $this->user->insert([
            'name' => $this->request->getVar('nama'),
            'phone_no' => $this->request->getVar('no_telp'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('no_telp'),
            'role' => 'pelanggan'
        ]);

        $last_insert_id = $this->user->getInsertID();

        $fileName = $this->generateRandomString().'.jpg';
        $dataBerkas = $this->request->getFile('foto_ktp');
        $this->pelanggan->insert([
            'user_id' => $last_insert_id,
            'nik' => $this->request->getVar('nik'),
            'alamat' => $this->request->getVar('alamat'),
            'foto_ktp' => $fileName
        ]);
        $dataBerkas->move('img/pelanggan/', $fileName);

        session()->setFlashdata('message', 'Tambah Data Berhasil');
        return redirect()->route('pelangganList');
    }

    public function edit($id)
    {
        $dataPelanggan = $this->pelanggan->DetailData($id);
        if (empty($dataPelanggan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $data['user'] = $dataPelanggan;
        return view('admin/pelanggan_edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'numeric' => 'NIK harus menggunakan angka'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'no_telp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'numeric' => 'NIK harus menggunakan angka'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => 'Email Harus Valid'
                ]
            ],
            'foto_ktp' => [
                'rules' => 'permit_empty|uploaded[foto_ktp]|mime_in[foto_ktp,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto_ktp,4056]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 4 MB'
                ]
 
            ],
            'password' => [
                'rules' => 'permit_empty|min_length[8]|max_length[255]',
                'errors' => [
                    'min_length' => 'Password minimal 8 karakter'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $dataPelanggan = $this->pelanggan->where('id',$id)->first();

        $dataktp = $this->request->getFile('foto_ktp');
        
        if($dataktp->isValid()){
            $fileName = $this->generateRandomString().'.jpg';
            $dataktp->move('img/pelanggan/', $fileName);
        }else{
            $fileName = $dataPelanggan['foto_ktp'];
        }

        $this->pelanggan->update($id,[
            'nik' => $this->request->getVar('nik'),
            'alamat' => $this->request->getVar('alamat'),
            'foto_ktp' => $fileName
        ]);
        
        $this->user->update($dataPelanggan['user_id'], [
            'name' => $this->request->getVar('nama'),
            'phone_no' => $this->request->getVar('no_telp'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password')
        ]);
        session()->setFlashdata('message', 'Update Data Berhasil');
        return redirect()->route('pelangganList');

    }

    public function delete($id)
    {
        $dataPegawai = $this->pelanggan->find($id);
        if (empty($dataPegawai)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }
        
        $this->user->delete($dataPegawai['user_id']);
        $this->pelanggan->delete($id);

        session()->setFlashdata('message', 'Delete Data Berhasil');
        return redirect()->route('pelangganList');
    }

    function generateRandomString($length = 10) {
        $t=time();
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $t.$randomString;
    }

}
