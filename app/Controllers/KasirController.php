<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KasirController extends BaseController
{
    public function index()
    {
        //
    }

    // public function penjualan($jenis_barang = "", $merk_barang = "", $jumlah_terjual = "") {
    //     $data = [
    //         // 'nama_barang' => $nama_barang,
    //         'jenis_barang' => $jenis_barang,
    //         'merk_barang' => $merk_barang,
    //         'jumlah_terjual' => $jumlah_terjual,
    //     ];

    //     return view('penjualan', $data);
    // }

    public function add() {
        $data = [
            'judul' => 'Tambah Barang'
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('Views/add_penjualan');
        echo view('home/index');
        echo view('templates/v_footer');
    }

    public function store() {
        $data = [
            // 'nama_barang' => $this->request->getVar('nama_barang'),
            'jenis_barang' => $this->request->getVar('jenis_barang'),
            'merk_barang' => $this->request->getVar('merk_barang'),
            'jumlah_terjual' => $this->request->getVar('jumlah_terjual'),
        ];

        return view('penjualan', $data);
    }

    public function table() {
        $data = [
            'judul' => 'Penjualan'
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('Views/list_penjualan');
        echo view('home/index');
        echo view('templates/v_footer');
    }
}
