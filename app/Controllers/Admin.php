<?php

namespace App\Controllers;

use App\Models\User_m;

class Admin extends BaseController
{
    public function index()
    {
       
        if (session()->get('isLoggedIn')) {
        return redirect()->to('/admin/dashboard');
        }

        return view('pageadmin/login', ['title' => 'Login']);
    }

    public function login()
    {
        $session = session();
        $model = new User_m();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Hash password input dengan SHA-1
        $hashedPassword = sha1($password);

        // Cari user berdasarkan username
        $user = $model->where('email', $username)->first();

        // Verifikasi
        if ($user && $user['password'] === $hashedPassword) {
            session()->set([
                'email' => $user['email'],
                'isLoggedIn' => true,
                'user_id'    => $user['id'],
                'nama'       => $user['nama'], // ← pastikan ini ada dan benar
                'username'   => $user['username'],
                'role'       => $user['role'],
            ]);
            return redirect()->to('/admin/dashboard');
        } else {
            session()->setFlashdata('error', 'Username atau password salah');
            return redirect()->to('/admin');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin');
    }

    public function dashboard()
    {
        check_not_login(); // Akan redirect jika belum login

        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $data = [
            'title' => 'Beranda',
            'nama' => session()->get('nama'),
        ];
        return $this->renderPageAdmin('pageadmin/beranda', $data);
        
    }
}
