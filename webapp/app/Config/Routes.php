<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::loginForm');
$routes->get('/login', 'Auth::loginForm');
$routes->post('/login', 'Auth::loginAction');
$routes->get('/logout', 'Auth::logout');


// ADMIN AREA (dengan filter)

$routes->group('admin', ['filter' => ['auth', 'role:Admin']], static function($routes) {
    // Dashboard Admin
    $routes->get('dashboard', 'Dashboard::index');

    // CRUD Anggota DPR
    $routes->get('anggota/tambah', 'Anggota::tambahForm');
    $routes->post('anggota/simpan', 'Anggota::simpan');
    $routes->get('anggota/lihat', 'Anggota::lihat');

    
    // soon:
    // $routes->get('anggota/lihat', 'Anggota::lihat');
    // $routes->get('anggota/ubah/(:num)', 'Anggota::ubahForm/$1');
    // $routes->post('anggota/update', 'Anggota::update');
    // $routes->get('anggota/hapus/(:num)', 'Anggota::hapus/$1');
});