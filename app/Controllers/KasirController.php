<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\JenisModel;
use App\Models\KeluarModel;
use App\Models\MerkModel;

class KasirController extends BaseController
{

    public $barangModel;
    public $jenisModel;
    public $keluarModel;
    public $merkModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->jenisModel = new JenisModel();
        $this->keluarModel = new KeluarModel();
        $this->merkModel = new MerkModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List Barang',
            'jenis' => $this->barangModel->getBarang(),
        ];
        return view('list_barang_untuk_kasir', $data);
    }

    public function profile4($jenis = "", $merk = "", $stok = "")
    {
        $data = [
            'jenis' => $jenis,
            'merk' => $merk,
            'stok' => $stok
        ];

        return view('profile4', $data);
    }

    public function create()
    {

        $jenisModel = new JenisModel();

        $jenis = $jenisModel->getJenis();

        if (session('validation') != null) {
            $validation = session('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $data = [
            'title' => 'Create Merk',
            'jenis' => $jenis,
            'validation' => $validation
        ];

        return view('create_merk', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_merk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kolom {field} harus di isi.'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kolom {field} harus di isi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to(base_url('/user4/create'))->withInput()->with('validation', $validation);
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
        return redirect()->to('/user4');
    }

    public function edit($id)
    {

        $barang = $this->barangModel->getBarang($id);
        $jenis = $this->jenisModel->getJenis();
        $data = [
            'title' => 'Edit Merk',
            'barang' => $barang,
            // 'password' => $password,
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
            return redirect()->to(base_url('/user4/' . $id . '/edit'))->withInput()->with('validation', $validation);
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
        return redirect()->to(base_url('/user4'));
    }

    public function destroy($id)
    {
        $result = $this->barangModel->deleteBarang($id);
        if (!$result) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
        return redirect()->to(base_url('/user4'))
            ->with('success', 'Berhasil menghapus data!');
    }

    public function keluar()
    {
        $data = [
            'title' => 'List keluar',
            'jenis' => $this->keluarModel->getkeluar(),
        ];
        return view('list_keluar', $data);
    }

    public function create_keluar()
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
            'title' => 'Create keluar',
            'jenis' => $jenis,
            'merk' => $merk,
            'validation' => $validation,
        ];

        return view('create_keluar', $data);
    }

    public function store_keluar()
    {
        // Validasi input
        if (!$this->validate([
            'nama_merk' => [
                'rules' => 'required',
            ],
            'keluar' => [
                'rules' => 'required|numeric',
            ],
            'jenis' => [
                'rules' => 'required',
            ],
            'tanggalk' => [
                'rules' => 'required',
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/create/keluar'))->withInput()->with('validation', $validation);
        }

        // Simpan data penjualan
        $keluarModel = new KeluarModel();
        $data = [
            'nama_merk' => $this->request->getVar('nama_merk'),
            'keluar' => $this->request->getVar('keluar'),
            'id_jenis' => $this->request->getVar('jenis'),
            'tanggalk' => $this->request->getVar('tanggalk'),
        ];
        $keluarModel->savekeluar($data);

        // Update stok barang
        $barangModel = new BarangModel();
        $barang = $barangModel->getBarangByMerkAndJenis($data['nama_merk'], $data['id_jenis']);

        if ($barang) {
            // Update stok
            $updatedStock = $barang['stok'] - $data['keluar'];
            $barangModel->updateBarang(['stok' => $updatedStock], $barang['id']);
        }

        // Redirect ke list_keluar
        return redirect()->to('/keluar');
    }

    public function editkeluar($id)
    {
        $keluar = $this->keluarModel->find($id);

        if (!$keluar) {
            return redirect()->to('/halaman_error');
        }

        $jenis = $this->jenisModel->findAll();
        $data = [
            'title' => 'Edit keluar',
            'keluar' => $keluar,
            'jenis' => $jenis,
            'keluar_id' => $id,
            'validation' => \Config\Services::validation(),
        ];

        return view('edit_keluar', $data);
    }
    public function updateKeluar($id)
    {
        $validation = \Config\Services::validation();

        // Validasi input
        if (!$this->validate([
            'jenis' => 'required',
            'tanggalk' => 'required',
            'nama_merk' => 'required',
            'keluar' => 'required|numeric',
        ])) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        // Proses update data
        $model = new KeluarModel();
        $data = [
            'id_jenis' => $this->request->getPost('jenis'),
            'tanggalk' => $this->request->getPost('tanggalk'),
            'nama_merk' => $this->request->getPost('nama_merk'),
            'keluar' => $this->request->getPost('keluar'),
        ];

        // dd($data); // Add this line to debug

        $result = $model->updateKeluar($id, $data);

        // dd($result); // Add this line to debug

        // Redirect ke halaman list_keluar.php dengan pesan sukses
        return redirect()->to('/keluar')->with('success', 'Data berhasil diperbarui');
    }

    public function destroykeluar($id)
    {
        $result = $this->keluarModel->deletekeluar($id);
        if (!$result) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
        return redirect()->to(base_url('/keluar'))
            ->with('success', 'Berhasil menghapus data!');
    }
}
