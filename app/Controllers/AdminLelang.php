<?php

namespace App\Controllers;

use App\Models\BarangLelangModel;

class Adminlelang extends BaseController
{

    protected $barangLelangModel;

    public function __construct()
    {
        $this->barangLelangModel = new BarangLelangModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Info Barang Lelang',
            'barangLelang' => $this->barangLelangModel->getBarangLelang()
        ];

        return view('adminlelang/adminlelang', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Barang Lelang',
            'baranglelang' => $this->barangLelangModel->getBarangLelang($id)
        ];

        //jika baranglelang tidak ditemukan
        if (empty($data['baranglelang'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Barang lelang ' . $id . ' tidak ditemukan.');
        }

        return view('adminlelang/updatebaranglelang', $data);
    }

    public function updatebaranglelang()
    {
        return view('adminlelang/updatebaranglelang');
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Cek Dulu Buat',
            'validation' => \Config\Services::validation()
        ];
        return view('adminlelang/tambahbaranglelang', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'gambar_barang' => 'required',
            'kelengkapan_barang' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/tambahbaranglelang')->withInput()->with('validation', $validation);
        }

        $id = url_title($this->request->getVar('nama_barang'), "-", true);
        $this->barangLelangModel->save([
            'nama_barang' => $this->request->getVar('nama_barang'),
            'harga_barang' => $this->request->getVar('harga_barang'),
            'kelengkapan_barang' => $this->request->getVar('kelengkapan_barang'),
            'gambar_barang' => $this->request->getVar('gambar_barang')
        ]);

        return redirect()->to("/adminlelang");
    }

    public function delete($id)
    {

        $this->barangLelangModel->delete($id);
        return redirect()->to('/adminlelang');
    }

    public function edit($id)
    {

        $data = [
            'title' => 'Form Ubah',
            'validation' => \Config\Services::validation(),
            'baranglelang' => $this->barangLelangModel->getBarangLelang($id)
        ];
        return view('adminlelang/updatebaranglelang', $data);
    }
    public function update($id)
    {
        $id = url_title($this->request->getVar('nama_barang'), "-", true);
        $this->barangLelangModel->save([
            'nama_barang' => $this->request->getVar('nama_barang'),
            'harga_barang' => $this->request->getVar('harga_barang'),
            'kelengkapan_barang' => $this->request->getVar('kelengkapan_barang'),
            'gambar_barang' => $this->request->getVar('gambar_barang')
        ]);

        return redirect()->to("/adminlelang");
    }
}
