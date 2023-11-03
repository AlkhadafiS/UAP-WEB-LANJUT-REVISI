<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('loginpage');
    }

    public function password(): string
    {
        return view('login_as');
    }

}
