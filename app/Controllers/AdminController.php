<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class AdminController extends BaseController
{
    public function __construct()
    {
    	$this->user = new User();

        if (session()->get('role') != "admin") {
            echo 'Access denied';
            exit;
        }
    }
    public function index()
    {
        return view("admin/dashboard");
    }

    public function adminList()
	{
		$data['users'] = $this->user->where('role','admin')->findAll();
		return view('admin/adminlist', $data);
	}

	public function adminAdd()
	{
		return view('admin/admin_add');
	}

	public function adminStore()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'no_telp' => [
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
            'password' => [
                'rules' => 'required|min_length[8]|max_length[255]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => 'Password minimal 8 karakter'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
 
        $this->user->insert([
            'name' => $this->request->getVar('nama'),
            'phone_no' => $this->request->getVar('no_telp'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ]);
        session()->setFlashdata('message', 'Tambah Data Berhasil');
        return redirect()->route('adminList');
    }

    public function adminEdit($id)
    {
        $dataPegawai = $this->user->find($id);
        if (empty($dataPegawai)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $data['user'] = $dataPegawai;
        return view('admin/admin_edit', $data);
    }

    public function adminUpdate($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'no_telp' => [
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
            'password' => [
                'rules' => 'permit_empty|min_length[8]|max_length[255]',
                'errors' => [
                    'min_length' => 'Password minimal 8 karakter'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
 
        $this->user->update($id, [
            'name' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'phone_no' => $this->request->getVar('no_telp'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password')
        ]);
        session()->setFlashdata('message', 'Update Data Berhasil');
        return redirect()->route('adminList');
    }

    public function adminDelete($id)
    {
        $dataPegawai = $this->user->find($id);
        if (empty($dataPegawai)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }
        $this->user->delete($id);
        session()->setFlashdata('message', 'Delete Data Berhasil');
        return redirect()->route('adminList');
    }
    
}
