<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\JabatanModel;

class SuperAdminController extends BaseController
{

    public $userModel;
    public $jabatanModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->jabatanModel = new JabatanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }

    public function profile($nama_user = "", $password = "", $jabatan = ""): string
    {
        $data = [
            'title' => 'Profile User',
            'nama_user' => $nama_user,
            'password' => $password,
            'jabatan' => $jabatan
        ];
        return view('profile', $data);
    }

    public function create()
    {
        $jabatan = $this->jabatanModel->getjabatan();

        if (session('validation') != null) {
            $validation = session('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $data = [
            'title' => 'Create User',
            'jabatan' => $jabatan,
            'validation' => $validation
        ];

        return view('create_user', $data);
    }

    public function edit($id)
    {
        
        $user = $this->userModel->getUser($id);
        $jabatan = $this->jabatanModel->getJabatan();
        $data = [
            'title' => 'Edit User',
            'user' => $user,
            // 'password' => $password,
            'jabatan' => $jabatan,
            'validation' => \Config\Services::validation()
        ];
        // dd($data);
        return view('edit_user', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'password' => [
                'rules' => 'required|max_length[25]',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'max_length[25]' => '{field} maksimal 10.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/user1/' . $id . '/edit'))->withInput()->with('validation', $validation);
        }

        $data = [
            'nama_user' => $this->request->getVar('nama_user'),
            'id_jabatan' => $this->request->getVar('jabatan'),
            'password' => $this->request->getVar('password'),
        ];

        $result = $this->userModel->updateUser($data, $id);

        if (!$result) {
            return redirect()->back()->withInput()
                ->with('error', 'Gagal mengubah data');
        }
        return redirect()->to(base_url('/user1'));
    }

    public function store()
    {
        if(!$this->validate([
            'nama_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kolom {field} harus di isi.'
                ]
            ],
            'password' => [
                'rules' => 'required|is_unique[user.password]',
                'errors' => [
                    'required' => 'kolom {field} harus di isi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to(base_url('/user1/create'))->withInput()->with('validation', $validation);        
        }

        $userModel = new UserModel();

        $this->userModel->saveUser([
            'nama_user' => $this->request->getVar('nama_user'),
            'password' => $this->request->getVar('password'),
            'id_jabatan' => $this->request->getVar('jabatan'),
        ]);

        $data = [
            'nama_user' => $this->request->getVar('nama_user'),
            'password' => $this->request->getVar('password'),
            'jabatan' => $this->request->getVar('jabatan'),
        ];

        return redirect()->to('/user1');
    }

    public function destroy($id)
    {
        $result = $this->userModel->deleteUser($id);
        if (!$result) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
        return redirect()->to(base_url('/user1'))
            ->with('success', 'Berhasil menghapus data!');
    }

}
