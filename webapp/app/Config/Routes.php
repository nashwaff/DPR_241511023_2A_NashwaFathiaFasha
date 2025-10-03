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
    $routes->get('anggota/tambah', 'Anggota::tambahForm');
    $routes->post('anggota/simpan', 'Anggota::simpan');
});