<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::loginForm');
$routes->get('/login', 'Auth::loginForm');
$routes->post('/login', 'Auth::loginAction');
$routes->get('/logout', 'Auth::logout');


$routes->group('admin', ['filter' => ['auth', 'role:Admin']], static function($routes) {
    // Dashboard Admin
    $routes->get('dashboard', 'Dashboard::index');

    // CRUD Anggota DPR
    $routes->get('anggota/tambah', 'Anggota::tambahForm');
    $routes->post('anggota/simpan', 'Anggota::simpan');
    $routes->get('anggota/lihat', 'Anggota::lihat');
    $routes->get('anggota/ubah/(:num)', 'Anggota::ubahForm/$1');
    $routes->post('anggota/update', 'Anggota::update');
    $routes->get('anggota/hapus/(:num)', 'Anggota::hapus/$1');

    //CRUD Komponen Gaji
    $routes->get('komponen/tambah', 'KomponenGaji::tambahForm');
    $routes->post('komponen/simpan', 'KomponenGaji::simpan');
    $routes->get('komponen/lihat', 'KomponenGaji::lihat');
    $routes->get('komponen/ubah/(:num)', 'KomponenGaji::ubah/$1');
    $routes->post('komponen/update/(:num)', 'KomponenGaji::update/$1');
    $routes->get('komponen/hapus/(:num)', 'KomponenGaji::hapus/$1');

    //CRUD Penggajian
    $routes->get('penggajian/tambah', 'Penggajian::tambahForm');
    $routes->post('penggajian/simpan', 'Penggajian::simpan');
    $routes->get('penggajian/lihat', 'Penggajian::lihat');
    $routes->get('penggajian/ubah/(:num)', 'Penggajian::ubah/$1');
    $routes->post('penggajian/update/(:num)', 'Penggajian::update/$1');
    $routes->get('penggajian/hapus/(:num)', 'Penggajian::hapus/$1');

});