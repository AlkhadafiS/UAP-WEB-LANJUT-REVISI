<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BarangController extends BaseController
{
    public function index()
    {
        //
    }

    public function barang($jenis_barang = "", $merk_barang = "", $jumlah_unit = "") {
        $data = [
            // 'nama_barang' => $nama_barang,
            'jenis_barang' => $jenis_barang,
            'merk_barang' => $merk_barang,
            'jumlah_unit' => $jumlah_unit,
        ];

        return view('barang', $data);
    }

    public function add() {
        $data = [
            'judul' => 'Tambah Barang'
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('Views/add_barang');
        echo view('home/index');
        echo view('templates/v_footer');
    }

    public function store() {
        $data = [
            'jenis_barang' => $this->request->getVar('jenis_barang'),
            'merk_barang' => $this->request->getVar('merk_barang'),
            'jumlah_unit' => $this->request->getVar('jumlah_unit'),
        ];
    
        return view('barang', $data);
    }
    

    public function table() {
        $data = [
            'judul' => 'Barang'
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('Views/list_barang');
        echo view('home/index');
        echo view('templates/v_footer');
    }

    public function jenis() {
        $data = [
            'judul' => 'Jenis Barang'
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('Views/list_jenis');
        echo view('home/index');
        echo view('templates/v_footer');
    }

    public function add_jenis() {
        $data = [
            'judul' => 'Tambah Jenis Barang'
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('Views/add_jenis');
       // echo view('home/index');
        //echo view('templates/v_footer');
    }
}
