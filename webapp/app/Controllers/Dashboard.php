<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu!');
        }

        return view('admin/dashboard');
    }
}