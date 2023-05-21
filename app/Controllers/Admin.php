<?php

namespace App\Controllers;

use App\Models\DataPelangganModel;
use CodeIgniter\Exceptions\PageNotFoundException;

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
        // Validasi inputan
        $validationRules = [
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
            'jumlah_diterima' => 'required',
            'jumlah_dibayarkan' => 'required',
            'batas_pembayaran' => 'required',
            'status_transaksi' => 'required'
        ];

        // Tambahkan aturan validasi untuk 'potong_atas' agar dapat kosong
        $validationRules['potong_atas'] = 'permit_empty';

        if (!$this->validate($validationRules)) {
            return redirect()->to('/simpandatapelanggan')->withInput();
        }

        // Ambil gambar
        $fileFoto = $this->request->getFile('foto_ktp');

        // Pindahkan file ke folder 'img'
        $fileFoto->move('img');

        $namaFoto = $fileFoto->getName();

        // Pengambilan nilai potong_atas
        $potongAtas = $this->request->getVar('potong_atas');

        // Cek apakah nilai potong_atas diberikan
        if ($potongAtas !== null) {
            // Pengaturan nilai jumlah_pinjaman dan jumlah_diterima
            $jumlahPinjaman = $this->request->getVar('jumlah_pinjaman');
            $jumlahDiterima = $potongAtas ? $jumlahPinjaman - ($jumlahPinjaman * 0.1) : $this->request->getVar('jumlah_diterima');
        } else {
            // Jika potong_atas kosong, biarkan jumlah_pinjaman dan jumlah_diterima sesuai inputan
            $jumlahPinjaman = $this->request->getVar('jumlah_pinjaman');
            $jumlahDiterima = $this->request->getVar('jumlah_diterima');
        }

        // Simpan data ke database
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
            'jumlah_pinjaman' => $jumlahPinjaman,
            'potong_atas' => $potongAtas,
            'jumlah_diterima' => $jumlahDiterima,
            'jumlah_dibayarkan' => $this->request->getVar('jumlah_dibayarkan'),
            'batas_pembayaran' => $this->request->getVar('batas_pembayaran'),
            'status_transaksi' => $this->request->getVar('status_transaksi')
        ]);

        return redirect()->to("/admin");
    }

    public function updatedatapelanggan($id)
    {
        // Dapatkan data pelanggan berdasarkan ID
        $datapelanggan = $this->dataPelangganModel->getDataPelanggan($id);

        if (empty($datapelanggan)) {
            throw new PageNotFoundException('Data pelanggan ' . $id . ' tidak ditemukan.');
        }

        $data = [
            'title' => 'Info Data Pelanggan',
            'dataPelanggan' => $datapelanggan
        ];

        return view('admin/updatedatapelanggan', $data);
    }

    public function updatedatatransaksi($id = null)
    {
        if ($id === null) {
            // Update semua data pelanggan
            $dataPelanggan = $this->dataPelangganModel->getAllDataPelanggan();
        } else {
            // Update data pelanggan berdasarkan ID
            $datapelanggan = $this->dataPelangganModel->getDataPelanggan($id);

            if (empty($datapelanggan)) {
                throw new PageNotFoundException('Data pelanggan ' . $id . ' tidak ditemukan.');
            }

            $dataPelanggan = [$datapelanggan]; // Ubah menjadi array agar kompatibel dengan view
        }

        if ($this->request->getMethod() === 'post') {
            // Lakukan validasi form
            $validationRules = [
                'jumlah_pinjaman' => 'required',
                'potong_atas' => 'permit_empty|in_list[0,1]',
                'jumlah_diterima' => 'required',
                'jumlah_dibayarkan' => 'required',
                'batas_pembayaran' => 'required',
                'status_transaksi' => 'required'
            ];

            $validationErrors = [
                'potong_atas' => [
                    'in_list' => 'Nilai potong atas tidak valid.'
                ]
            ];

            if (!$this->validate($validationRules, $validationErrors)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Ambil nilai dari form
            $jumlahPinjaman = $this->request->getPost('jumlah_pinjaman');
            $potongAtas = $this->request->getPost('potong_atas');
            $jumlahDiterima = $this->request->getPost('jumlah_diterima');
            $jumlahDibayarkan = $this->request->getPost('jumlah_dibayarkan');
            $batasPembayaran = $this->request->getPost('batas_pembayaran');
            $statusTransaksi = $this->request->getPost('status_transaksi');

            // Lakukan pembaruan data transaksi
            if ($id === null) {
                // Update semua data pelanggan
                foreach ($dataPelanggan as $pelanggan) {
                    $this->dataPelangganModel->update($pelanggan['id'], [
                        'jumlah_pinjaman' => $jumlahPinjaman,
                        'potong_atas' => $potongAtas,
                        'jumlah_diterima' => $jumlahDiterima,
                        'jumlah_dibayarkan' => $jumlahDibayarkan,
                        'batas_pembayaran' => $batasPembayaran,
                        'status_transaksi' => $statusTransaksi
                    ]);
                }
            } else {
                // Update data pelanggan berdasarkan ID
                $this->dataPelangganModel->update($id, [
                    'jumlah_pinjaman' => $jumlahPinjaman,
                    'potong_atas' => $potongAtas,
                    'jumlah_diterima' => $jumlahDiterima,
                    'jumlah_dibayarkan' => $jumlahDibayarkan,
                    'batas_pembayaran' => $batasPembayaran,
                    'status_transaksi' => $statusTransaksi
                ]);
            }

            return redirect()->to('/admin');
        }

        $data = [
            'title' => 'Info Data Transaksi',
            'dataPelanggan' => $datapelanggan
        ];

        return view('admin/updatedatatransaksi', $data);
    }

    public function delete($id)
    {
        // Dapatkan data pelanggan berdasarkan ID
        $datapelanggan = $this->dataPelangganModel->find($id);

        // Cek apakah ada data pelanggan dengan ID yang diberikan
        if (empty($datapelanggan)) {
            throw new PageNotFoundException('Data pelanggan ' . $id . ' tidak ditemukan.');
        }

        // Cek apakah gambar bukan default.jpg
        if ($datapelanggan['foto_ktp'] != 'default.jpg') {
            // Hapus gambar
            unlink('img/' . $datapelanggan['foto_ktp']);
        }

        // Hapus data pelanggan dari database
        $this->dataPelangganModel->delete($id);
        return redirect()->to('/admin');
    }
}
