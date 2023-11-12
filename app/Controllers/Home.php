<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('loginpage');
    }

    // public function profile3($jenis = "", $merk = "", $stok ="")
    // {
    //     $data = [
    //         'jenis' => $jenis,
    //         'merk' => $merk,
    //         'stok' => $stok
    //     ];

    //     return view('profile3', $data);
    // }

}
