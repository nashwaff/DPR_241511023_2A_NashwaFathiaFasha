<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $username = trim($this->request->getPost('username'));
        $password = (string)$this->request->getPost('password');

        $user = (new PenggunaModel())->where('username', $username)->first();
        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Username atau password salah.');
        }

        //set session
        session()->set([
            'isLoggedIn' => true,
            'user_id'    => $user['id_pengguna'],
            'username'   => $user['username'],
            'nama'       => trim(($user['nama_depan'] ?? '').' '.($user['nama_belakang'] ?? '')),
            'role'       => $user['role'], // 'Admin' atau 'Public'
        ]);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('msg', 'Anda sudah logout.');
    }
}