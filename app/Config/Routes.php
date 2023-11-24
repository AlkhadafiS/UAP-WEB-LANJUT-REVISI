<?php

use App\Controllers\KasirController;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\SuperAdminController;
use App\Controllers\AdminGudangController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/1', 'SuperAdminController::index');
$routes->get('/2', 'Home::Dashboard2');
$routes->get('/3', 'AdminGudangController::index');
$routes->get('/4', 'KasirController::index');

$routes->get('/user1/profile/(:any)/(:any)/(:any)', 'SuperAdminController::profile/$1/$2/$3');

$routes->get('/user1/create', 'SuperAdminController::create');
$routes->post('/user1/store', 'SuperAdminController::store');

$routes->get('/user1', 'SuperAdminController::index');

$routes->get('/user1/(:any)/edit', [SuperAdminController::class, 'edit']);
$routes->put('/user1/(:any)', [SuperAdminController::class, 'update']);
$routes->delete('user1/(:any)', [SuperAdminController::class, 'destroy']);

$routes->get('/user3/profile3', 'AdminGudangController::profile3');
$routes->get('/user3/profile3/(:any)/(:any)/(:any)', 'AdminGudangController::profile3/$1/$2/$3');

$routes->get('/user3/create', 'AdminGudangController::create');
$routes->post('/user3/store', 'AdminGudangController::store');

$routes->get('/user3', 'AdminGudangController::index');

$routes->get('/user3/(:any)/edit', [AdminGudangController::class, 'edit']);
$routes->put('/user3/(:any)', [AdminGudangController::class, 'update']);
$routes->delete('user3/(:any)', [AdminGudangController::class, 'destroy']);

$routes->get('/user4/profile4', 'KasirController::profile4');
$routes->get('/user4/profile4/(:any)/(:any)/(:any)', 'KasirController::profile4/$1/$2/$3');

$routes->get('/user4/create', 'KasirController::create');
$routes->post('/user4/store', 'KasirController::store');

$routes->get('/user4', 'KasirController::index');

$routes->get('/user4/(:any)/edit', [KasirController::class, 'edit']);
$routes->put('/user4/(:any)', [KasirController::class, 'update']);
$routes->delete('user4/(:any)', [KasirController::class, 'destroy']);

$routes->get('/transaksi', 'AdminGudangController::transaksi');
$routes->get('/create/transaksi', 'AdminGudangController::create_transaksi');
$routes->post('/user3/store_transaksi', 'AdminGudangController::store_transaksi');
$routes->delete('transaksi/(:any)', [AdminGudangController::class, 'destroyTransaksi']);
$routes->get('/transaksi/edit/(:any)', 'AdminGudangController::editTransaksi/$1');
$routes->put('/transaksi/(:any)', 'AdminGudangController::updateTransaksi/$1');

$routes->get('/keluar', 'KasirController::keluar');
$routes->get('/create/keluar', 'KasirController::create_keluar');
$routes->post('/user4/store_keluar', 'KasirController::store_keluar');
$routes->delete('keluar/(:any)', [KasirController::class, 'destroyKeluar']);
$routes->get('/keluar/edit/(:any)', 'KasirController::editkeluar/$1');
#$routes->put('/keluar/updatekeluar/(:num)', 'KasirController::updateKeluar/$1');
$routes->post('/keluar/updatekeluar/(:num)', 'KasirController::updateKeluar/$1');
$routes->put('/keluar/updatekeluar/(:num)', 'KasirController::updateKeluar/$1');