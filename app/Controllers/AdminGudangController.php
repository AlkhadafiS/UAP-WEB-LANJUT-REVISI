<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\JenisModel;

class AdminGudangController extends BaseController
{

    public $barangModel;
    public $jenisModel;

    public function __construct(){
        $this->barangModel = new BarangModel();
        $this->jenisModel = new JenisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List Barang',
            'jenis' => $this->barangModel->getBarang(),
        ];
        return view('list_barang', $data);
    }

    public function profile3($jenis = "", $merk = "", $stok ="")
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
        if(!$this->validate([
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
}
