<?php

namespace App\Controllers;

use App\Models\Pengguna;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function loginForm()
    {
        return view('auth/login');
    }

    public function loginAction()
    {
        $session = session();
        $model = new Pengguna();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'user_id' => $user['id_pengguna'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'logged_in' => true
                ]);
                return redirect()->to('/admin/dashboard');
            } else {
                $session->setFlashdata('error', 'Password salah!');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan!');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}