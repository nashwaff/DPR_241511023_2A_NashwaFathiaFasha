<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        // Ambil data user dari session
        $username = session()->get('username');
        $role = session()->get('role');

        return view('admin/dashboard', [
            'username' => $username,
            'role'     => $role
        ]);
    }
}