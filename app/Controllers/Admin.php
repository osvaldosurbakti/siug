<?php

namespace App\Controllers;

use App\Models\DataPelangganModel;

class Admin extends BaseController
{
    protected $dataPelangganModel;

    public function __construct()
    {
        $this->dataPelangganModel = new DataPelangganModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Info Barang Lelang',
            'dataPelanggan' => $this->dataPelangganModel->getDataPelanggan()
        ];

        return view('admin/admin', $data);
    }


    public function create()
    {
        session();
        $data = [
            'title' => 'Simpan Data',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/simpandatapelanggan', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'nama' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'nomor_handphone' => 'required',
            'tanggal_gadai' => 'required',
            'nama_barang' => 'required',
            'kelengkapan_barang' => 'required',
            'password' => 'required',
            'foto_ktp' => 'uploaded[foto_ktp]',
            'jumlah_pinjaman' => 'required',
            'potong_atas' => 'required',
            'jumlah_diterima' => 'required',
            'jumlah_dibayarkan' => 'required',
            'batas_pembayaran' => 'required',
            'status_transaksi' => 'required'
        ])) {
            return redirect()->to('/simpandatapelanggan')->withInput();
        }

        //ambil gambar
        $fileFoto = $this->request->getFile('foto_ktp');
        //pindahkan file ke folder
        $fileFoto->move('img');

        $namaFoto = $fileFoto->getName();

        $id = url_title($this->request->getVar('nama_barang'), "-", true);
        $this->dataPelangganModel->save([
            'nama' => $this->request->getVar('nama'),
            'nik' => $this->request->getVar('nik'),
            'alamat' => $this->request->getVar('alamat'),
            'nomor_handphone' => $this->request->getVar('nomor_handphone'),
            'tanggal_gadai' => $this->request->getVar('tanggal_gadai'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'kelengkapan_barang' => $this->request->getVar('kelengkapan_barang'),
            'password' => $this->request->getVar('password'),
            'foto_ktp' => $namaFoto,
            'jumlah_pinjaman' => $this->request->getVar('jumlah_pinjaman'),
            'potong_atas' => $this->request->getVar('potong_atas'),
            'jumlah_diterima' => $this->request->getVar('jumlah_diterima'),
            'jumlah_dibayarkan' => $this->request->getVar('jumlah_dibayarkan'),
            'batas_pembayaran' => $this->request->getVar('batas_pembayaran'),
            'status_transaksi' => $this->request->getVar('status_transaksi'),

        ]);

        return redirect()->to("/admin");
    }

    public function updatedatapelanggan($id)
    {
        $datapelanggan = $this->dataPelangganModel->getDataPelanggan($id);

        if (empty($datapelanggan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data pelanggan ' . $id . ' tidak ditemukan.');
        }
        $data = [
            'title' => 'Info Data Pelanggan',
            'dataPelanggan' => $datapelanggan
        ];

        return view('admin/updatedatapelanggan', $data);
    }


    public function updatedatatransaksi($id)
    {
        $datapelanggan = $this->dataPelangganModel->getDataPelanggan($id);

        if (empty($datapelanggan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data pelanggan ' . $id . ' tidak ditemukan.');
        }
        $data = [
            'title' => 'Info Data Transaksi',
            'dataPelanggan' => $datapelanggan
        ];

        return view('admin/updatedatatransaksi', $data);
    }
}
