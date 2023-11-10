<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        $data = [
            'judul' => 'Homepage'
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('home/index');
        echo view('templates/v_footer');
    }
    
    public function index1(){
    return view('loginpage');
  }

    public function password(): string
    {
        return view('login_as');
    }

}
