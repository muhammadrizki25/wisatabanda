<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login',
        ];
        return view('admin/login', $data);
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // $adminModel = new \App\Models\AdminModel();
        $admin = $this->ModelAdmin->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['hashed_password'])) {
            session()->set('admin_logged_in', true);
            session()->set('admin_username', $username);   
            session()->setFlashdata('show_toast', true);         
            return redirect()->to('dashboard');
        } else {
            session()->setFlashData('failed', 'Username atau Password salah!');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        session()->remove('admin_logged_in');
        return redirect()->to('login');
    }
}
