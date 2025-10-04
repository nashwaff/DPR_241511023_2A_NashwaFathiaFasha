<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PublicDashboard extends Controller
{
    public function index()
    {
        return view('public/dashboard');
    }
}