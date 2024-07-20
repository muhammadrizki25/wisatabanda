<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class AdminController extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $data = [
            'title' => 'Daftar Admin',
            'daftar_admin' => $this->ModelAdmin->orderBy('id', 'DESC')->findAll()
        ];
        return view('admin/daftar-admin/index', $data);
    }

    public function simpan()
    {
        $rules = $this->validate([
            'nama'          => [
                'rules' => 'required|is_unique[penginapan.nama]',
                'errors'=> [
                    'required' => 'Masukkan Penginapan',
                    'is_unique' => 'Nama Penginapan yang dimasukkan sudah ada'
                ]
            ],
            'username'     => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Masukkan Username',
                ]
            ],  
            'email'     => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Masukkan Email',
                ]
            ],
            'password'     => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Masukkan Koordinat password',
                ]
            ],
        ]);

        // jika validasi gagal
        if (!$rules){
            session()->setFlashData('errors', $this->validator->getErrors());
            session()->setFlashData('failed', 'Data Penginapan Gagal Ditambahkan');
            return redirect()->back()->withInput();
        }

        // Ambil data dari form dan simpan ke database
        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];

        $password = $data['password'];

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Simpan informasi admin ke database
        $this->ModelAdmin->insert([
            'nama' => $data['nama'],
            'username' => $data['username'],
            'email' => $data['email'],
            'hashed_password' => $hashedPassword,
            // 'verification_token' => $verificationToken,
        ]);

        // Redirect ke halaman sukses atau halaman yang sesuai
        return redirect()->to(base_url('admin'))->with('success', 'Data Admin Berhasil Ditambahkan');
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $this->ModelAdmin->delete($id);

            $result = [
                'success' => 'Data admin berhasil dihapus'
            ];

            echo json_encode($result);
        } else {
            exit('ada yang salah');
        }
    }
}
