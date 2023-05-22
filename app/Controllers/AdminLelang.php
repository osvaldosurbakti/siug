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
        $baranglelang = $this->barangLelangModel->getBarangLelang($id);

        if (empty($baranglelang)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Barang lelang ' . $id . ' tidak ditemukan.');
        }

        $data = [
            'title' => 'Barang Lelang',
            'baranglelang' => $baranglelang
        ];

        return view('adminlelang/updatebaranglelang', $data);
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
            'gambar_barang' => 'uploaded[gambar_barang]',
            'kelengkapan_barang' => 'required'
        ])) {
            return redirect()->to('/tambahbaranglelang')->withInput();
        }

        //ambil gambar
        $fileGambar = $this->request->getFile('gambar_barang');
        //pindahkan file ke folder
        $fileGambar->move('img');

        $namaGambar = $fileGambar->getName();

        $id = url_title($this->request->getVar('nama_barang'), "-", true);
        $this->barangLelangModel->save([
            'nama_barang' => $this->request->getVar('nama_barang'),
            'harga_barang' => $this->request->getVar('harga_barang'),
            'kelengkapan_barang' => $this->request->getVar('kelengkapan_barang'),
            'gambar_barang' => $namaGambar
        ]);

        return redirect()->to("/adminlelang");
    }

    public function delete($id)
    {

        //cari gambar berdasarkan id
        $baranglelang = $this->barangLelangModel->find($id);

        //cek file gambarnya default.jpg
        if ($baranglelang['gambar_barang'] != 'default.jpg') {
            // hapus gambar
            unlink('img/' . $baranglelang['gambar_barang']);
        }

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
        if (!$this->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'kelengkapan_barang' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $barangLelang = $this->barangLelangModel->find($id);

        if (empty($barangLelang)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Barang lelang ' . $id . ' tidak ditemukan.');
        }

        $gambarBarang = $this->request->getFile('gambar_barang');
        $namaGambar = $barangLelang['gambar_barang'];

        // Cek apakah ada file gambar baru yang diupload
        if ($gambarBarang->isValid() && !$gambarBarang->hasMoved()) {
            // Hapus gambar lama jika bukan default.jpg
            if ($namaGambar != 'default.jpg') {
                unlink('img/' . $namaGambar);
            }

            // Pindahkan gambar baru ke folder
            $gambarBarang->move('img');
            $namaGambar = $gambarBarang->getName();
        }

        $this->barangLelangModel->update($id, [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'harga_barang' => $this->request->getVar('harga_barang'),
            'kelengkapan_barang' => $this->request->getVar('kelengkapan_barang'),
            'gambar_barang' => $namaGambar
        ]);

        return redirect()->to("/adminlelang");
    }
}
