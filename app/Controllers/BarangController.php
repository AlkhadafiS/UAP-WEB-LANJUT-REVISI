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
        return view('add_barang');
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
        return view('list_barang');
    }
}
