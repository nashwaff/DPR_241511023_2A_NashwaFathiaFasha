<?php

namespace App\Controllers;

use App\Models\Pengguna;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function loginForm()
    {
        session()->destroy();

        if (session()->get('logged_in')) {
            if (session()->get('role') === 'Admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/public/dashboard');
            }
        }

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

                // Simpan data penting ke session
                $sessionData = [
                    'user_id'  => $user['id_pengguna'],
                    'username' => $user['username'],
                    'role'     => $user['role'],
                    'logged_in'=> true
                ];
                $session->set($sessionData);

                // Arahkan sesuai role
                if ($user['role'] === 'Admin') {
                    return redirect()->to('/admin/dashboard');
                } elseif ($user['role'] === 'Public') {
                    return redirect()->to('/public/dashboard');
                } else {
                    // Jika role tidak dikenal, logout dan beri pesan
                    $session->destroy();
                    $session->setFlashdata('error', 'Role tidak dikenal!');
                    return redirect()->to('/login');
                }
            } else {
                // Password salah
                $session->setFlashdata('error', 'Password salah!');
                return redirect()->to('/login');
            }
        } else {
            // Username tidak ditemukan
            $session->setFlashdata('error', 'Username tidak ditemukan!');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('message', 'Anda berhasil logout.');
    }
}