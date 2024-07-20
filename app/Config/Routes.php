<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->group('dashboard', ['filter' => 'auth'], function($routes)
{
    // $routes->get('/', 'DashboardController::index');
    // Tambahkan route lainnya yang terkait dengan dashboard di sini
    $routes->get('/', 'Admin\DashboardController::index'); 
}); 
$routes->get('/', 'Admin\DashboardController::index', ['filter' => 'auth']);
// $routes->get('/dashboard', 'Admin\DashboardController::index');
$routes->get('/wisata', 'Admin\WisataController::index', ['filter' => 'auth']);
$routes->get('/wisata/tambah', 'Admin\WisataController::form_create', ['filter' => 'auth']);
$routes->post('/wisata/simpan', 'Admin\WisataController::simpan', ['filter' => 'auth']);
$routes->get('wisata/detail/(:num)', 'Admin\WisataController::detail/$1', ['filter' => 'auth']);
$routes->post('/wisata/delete', 'admin\WisataController::delete', ['filter' => 'auth']);
$routes->get('/wisata/update/(:num)', 'admin\WisataController::update/$1', ['filter' => 'auth']);
$routes->put('/wisata/simpan_update/(:num)', 'admin\WisataController::simpan_update/$1', ['filter' => 'auth']);

$routes->get('/penginapan', 'Admin\PenginapanController::index', ['filter' => 'auth']);
$routes->get('/penginapan/tambah', 'Admin\PenginapanController::form_create', ['filter' => 'auth']);
$routes->post('/penginapan/simpan', 'Admin\PenginapanController::simpan', ['filter' => 'auth']);
$routes->get('penginapan/detail/(:num)', 'Admin\PenginapanController::detail/$1', ['filter' => 'auth']);
$routes->post('/penginapan/delete', 'admin\PenginapanController::delete', ['filter' => 'auth']);
$routes->get('/penginapan/update/(:num)', 'admin\PenginapanController::update/$1', ['filter' => 'auth']);
$routes->put('/penginapan/simpan_update/(:num)', 'admin\PenginapanController::simpan_update/$1', ['filter' => 'auth']);

$routes->get('/admin', 'Admin\AdminController::index', ['filter' => 'auth']);
// $routes->get('/admin/tambah', 'Admin\AdminController::form_create');
$routes->post('/admin/simpan', 'Admin\AdminController::simpan', ['filter' => 'auth']);
$routes->get('admin/detail/(:num)', 'Admin\AdminController::detail/$1', ['filter' => 'auth']);
$routes->post('/admin/delete', 'admin\AdminController::delete', ['filter' => 'auth']);
$routes->get('/admin/update/(:num)', 'admin\AdminController::update/$1', ['filter' => 'auth']);
$routes->put('/admin/simpan_update/(:num)', 'admin\AdminController::simpan_update/$1', ['filter' => 'auth']);

$routes->get('/login', 'Admin\LoginController::index');
$routes->post('/auth/login', 'Admin\LoginController::login');
$routes->get('/auth/logout', 'Admin\LoginController::logout');



#API
$routes->get('api/wisata', 'API\WisataController::index');


$routes->get('api/penginapan', 'API\PenginapanController::index');

