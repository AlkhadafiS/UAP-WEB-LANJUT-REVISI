<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\JenisModel;
use App\Models\TransaksiModel;
use App\Models\MerkModel;

class AdminGudangController extends BaseController
{

    public $barangModel;
    public $jenisModel;
    public $transaksiModel;
    public $merkModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->jenisModel = new JenisModel();
        $this->transaksiModel = new TransaksiModel();
        $this->merkModel = new MerkModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List Barang',
            'jenis' => $this->barangModel->getBarang(),
        ];
        return view('list_barang', $data);
    }

    public function profile3($jenis = "", $merk = "", $stok = "")
    {
        $data = [
            'jenis' => $jenis,
            'merk' => $merk,
            'stok' => $stok
        ];

        return view('profile3', $data);
    }

    public function create()
    {

        $jenisModel = new JenisModel();
        $merkModel = new MerkModel();

        $jenis = $jenisModel->getJenis();
        $merk = $merkModel->getMerk();

        if (session('validation') != null) {
            $validation = session('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $data = [
            'title' => 'Create Merk',
            'jenis' => $jenis,
            'merk' => $merk,
            'validation' => $validation
        ];

        return view('create_merk', $data);
    }

    public function store()
    {

        if (!$this->validate([
            'nama_merk' => [
                'rules' => 'required|is_unique[barang.nama_merk]',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi.',
                    'is_unique' => 'Merk sudah ada pada tabel.'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kolom {field} harus di isi.',
                    'is_unique' => 'Merk ini sudah ada pada table'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to(base_url('/user3/create'))->withInput()->with('validation', $validation);
        }

        $barangModel = new BarangModel();

        $barangModel->saveBarang([
            'nama_merk' => $this->request->getVar('nama_merk'),
            'stok' => $this->request->getVar('stok'),
            'id_jenis' => $this->request->getVar('jenis'),
        ]);

        $data = [
            'nama_merk' => $this->request->getVar('nama_merk'),
            'stok' => $this->request->getVar('stok'),
            'jenis' => $this->request->getVar('jenis'),
        ];

        return redirect()->to('/user3');
    }

    public function edit($id)
    {

        $barang = $this->barangModel->getBarang($id);
        $jenis = $this->jenisModel->getJenis();
        $merk = $this->merkModel->getMerk();

        $data = [
            'title' => 'Edit Merk',
            'barang' => $barang,
            // 'password' => $password,
            'merk' => $merk,
            'jenis' => $jenis,
            'validation' => \Config\Services::validation()
        ];
        // dd($data);
        return view('edit_merk', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_merk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/user3/' . $id . '/edit'))->withInput()->with('validation', $validation);
        }

        $data = [
            'nama_merk' => $this->request->getVar('nama_merk'),
            'id_jenis' => $this->request->getVar('jenis'),
            'stok' => $this->request->getVar('stok'),
        ];

        $result = $this->barangModel->updateBarang($data, $id);

        if (!$result) {
            return redirect()->back()->withInput()
                ->with('error', 'Gagal mengubah data');
        }
        return redirect()->to(base_url('/user3'));
    }

    public function destroy($id)
    {
        $result = $this->barangModel->deleteBarang($id);
        if (!$result) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
        return redirect()->to(base_url('/user3'))
            ->with('success', 'Berhasil menghapus data!');
    }

    public function transaksi()
    {
        $data = [
            'title' => 'List Transaksi',
            'jenis' => $this->transaksiModel->getTransaksi(),
        ];
        return view('list_transaksi', $data);
    }

    public function create_transaksi()
    {
        $jenisModel = new JenisModel();
        $jenis = $jenisModel->getJenis();

        $merkModel = new MerkModel();
        $merk = $merkModel->getMerk();

        if (session('validation') != null) {
            $validation = session('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $data = [
            'title' => 'Create Transaksi',
            'jenis' => $jenis,
            'merk' => $merk, // Pastikan variabel $merk dikirim ke view
            'validation' => $validation,
        ];

        return view('create_transaksi', $data);
    }

    public function store_transaksi()
    {
        if (!$this->validate([
            'nama_merk' => [
                'rules' => 'required',

            ],
            'transaksi' => [
                'rules' => 'required|numeric',

            ],
            'jenis' => [
                'rules' => 'required',

            ],
            'tanggal' => [
                'rules' => 'required',
            ]
        ])) {
            // If validation fails, store the errors in session and redirect back to the form
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/create/transaksi'))->withInput()->with('validation', $validation);
        }

        // If validation passes, save the data to the database
        $transaksiModel = new TransaksiModel();

        $data = [
            'nama_merk' => $this->request->getVar('nama_merk'),
            'transaksi' => $this->request->getVar('transaksi'),
            'id_jenis' => $this->request->getVar('jenis'),
            'tanggal' => $this->request->getVar('tanggal'),
        ];

        $transaksiModel->saveTransaksi($data);

        // Update stock in list_barang
        $barangModel = new BarangModel();
        $barang = $barangModel->getBarangByMerkAndJenis($data['nama_merk'], $data['id_jenis']);

        if ($barang) {
            // Update stock
            $updatedStock = $barang['stok'] + $data['transaksi'];
            $barangModel->updateBarang(['stok' => $updatedStock], $barang['id']);
        }

        // Redirect to the list_transaksi page
        return redirect()->to('/transaksi');
    }

    public function editTransaksi($id)
    {

        $transaksi = $this->transaksiModel->find($id);

        if (!$transaksi) {
            // Handle jika transaksi tidak ditemukan
            // Misalnya, tampilkan pesan error atau redirect ke halaman lain
            return redirect()->to('/halaman_error');
        }

        $jenis = $this->jenisModel->findAll();
        $data = [
            'title' => 'Edit Transaksi',
            'transaksi' => $transaksi,
            'jenis' => $jenis,
            'transaksi_id' => $id, // Set transaksi_id dengan ID yang sesuai
            'validation' => \Config\Services::validation(),
        ];

        return view('edit_transaksi', $data);
    }

    public function updateTransaksi($id)
    {
        // Ambil data transaksi berdasarkan ID
        $transaksi = $this->transaksiModel->find($id);
        if (empty($transaksi)) {
            return redirect()->to(base_url('transaksi'))->with('error', 'Transaksi tidak ditemukan.');
        }

        // Pastikan kunci "barang_id" ada dalam array $transaksi sebelum mengaksesnya
        if (!array_key_exists('barang_id', $transaksi)) {
            return redirect()->to(base_url('transaksi'))->with('error', 'Kunci "barang_id" tidak ditemukan dalam data transaksi.');
        }

        // Ambil data barang berdasarkan ID transaksi
        $barang = $this->barangModel->find($transaksi['barang_id']);
        if (empty($barang)) {
            return redirect()->to(base_url('transaksi'))->with('error', 'Barang tidak ditemukan.');
        }

        // Ambil data baru yang dikirimkan dari form
        $newTransaksiAmount = $this->request->getPost('jumlah_transaksi');

        // Lakukan validasi atau operasi lainnya sesuai kebutuhan Anda

        // Update data transaksi
        $this->transaksiModel->update($id, ['jumlah_transaksi' => $newTransaksiAmount]);

        // Redirect ke halaman transaksi dengan pesan sukses
        return redirect()->to(base_url('transaksi'))->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroyTransaksi($id)
    {
        $result = $this->transaksiModel->deleteTransaksi($id);

        if ($result) {
            return redirect()->to(base_url('/transaksi'))->with('success', 'Berhasil menghapus data!');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }

    // ...

    public function deleteTransaksi($id)
    {
        // Dapatkan data transaksi sebelum menghapusnya
        $transaksi = $this->transaksiModel->find($id);

        if (!$transaksi) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
        }

        // Hapus transaksi
        $result = $this->transaksiModel->deleteTransaksi($id);

        if ($result) {
            // Perbarui stok di tabel barang
            $this->updateBarangStockAfterDelete($transaksi);
            return redirect()->to(base_url('/transaksi'))->with('success', 'Berhasil menghapus data!');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }

    // Metode untuk memperbarui stok barang setelah menghapus transaksi
    private function updateBarangStockAfterDelete($transaksi)
    {
        $barangModel = new BarangModel();
        $barang = $barangModel->getBarangByMerkAndJenis($transaksi['nama_merk'], $transaksi['id_jenis']);

        if ($barang) {
            // Perbarui stok dengan menambahkan kembali jumlah transaksi yang dihapus
            $updatedStock = $barang['stok'] + $transaksi['transaksi'];
            $barangModel->updateBarang(['stok' => $updatedStock], $barang['id']);
        }
    }
}
