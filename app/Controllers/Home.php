<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (logged_in()) {
            if (in_groups('super_admin')) {
                return redirect()->to(base_url('/1'));
            } else if (in_groups('manager')) {
                return redirect()->to(base_url('/2'));
            } else if (in_groups('admin_gudang')) {
                return redirect()->to(base_url('/3'));
            } else if (in_groups('kasir')) {
                return redirect()->to(base_url('/4'));
            }
        } else {
            return redirect()->to(base_url('/login'));
        }
    }

    public function login()
    {
        return view('auth/login');
    }
    public function register()
    {
        return view('auth/register');
    }

    public function user()
    {
        return view('user/index');
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
