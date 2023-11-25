<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\SuperAdminController;
use App\Controllers\AdminGudangController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home/register', 'Home::register');
$routes->get('/home/user', 'Home::user');
$routes->get('/1', 'SuperAdminController::index', ['filter' => 'role:super_admin']);
$routes->get('/2', 'Home::Dashboard2');
$routes->get('/3', 'AdminGudangController::index', ['filter' => 'role:admin_gudang']);
$routes->get('/4', 'KasirController::index', ['filter' => 'role:kasir']);

$routes->get('/user1/profile/(:any)/(:any)/(:any)', 'SuperAdminController::profile/$1/$2/$3', ['filter' => 'role:super_admin']);

$routes->get('/user1/create', 'SuperAdminController::create', ['filter' => 'role:super_admin']);
$routes->post('/user1/store', 'SuperAdminController::store', ['filter' => 'role:super_admin']);

$routes->get('/user1', 'SuperAdminController::index', ['filter' => 'role:super_admin']);

$routes->get('/user1/(:any)/edit', [SuperAdminController::class, 'edit'], ['filter' => 'role:super_admin']);
$routes->put('/user1/(:any)', [SuperAdminController::class, 'update'], ['filter' => 'role:super_admin']);
$routes->delete('user1/(:any)', [SuperAdminController::class, 'destroy'], ['filter' => 'role:super_admin']);

$routes->get('/user3/profile3', 'AdminGudangController::profile3', ['filter' => 'role:admin_gudang']);
$routes->get('/user3/profile3/(:any)/(:any)/(:any)', 'AdminGudangController::profile3/$1/$2/$3', ['filter' => 'role:admin_gudang']);

$routes->get('/user3/create', 'AdminGudangController::create', ['filter' => 'role:admin_gudang']);
$routes->post('/user3/store', 'AdminGudangController::store', ['filter' => 'role:admin_gudang']);

$routes->get('/user3', 'AdminGudangController::index', ['filter' => 'role:admin_gudang']);

$routes->get('/user3/(:any)/edit', [AdminGudangController::class, 'edit'], ['filter' => 'role:admin_gudang']);
$routes->put('/user3/(:any)', [AdminGudangController::class, 'update'], ['filter' => 'role:admin_gudang']);
$routes->delete('user3/(:any)', [AdminGudangController::class, 'destroy'], ['filter' => 'role:admin_gudang']);

$routes->get('/user4/profile4', 'KasirController::profile4', ['filter' => 'role:kasir']);
$routes->get('/user4/profile4/(:any)/(:any)/(:any)', 'KasirController::profile4/$1/$2/$3', ['filter' => 'role:kasir']);

$routes->get('/user4/create', 'KasirController::create', ['filter' => 'role:kasir']);
$routes->post('/user4/store', 'KasirController::store', ['filter' => 'role:kasir']);

$routes->get('/user4', 'KasirController::index', ['filter' => 'role:kasir']);

$routes->get('/user4/(:any)/edit', [KasirController::class, 'edit'], ['filter' => 'role:kasir']);
$routes->put('/user4/(:any)', [KasirController::class, 'update'], ['filter' => 'role:kasir']);
$routes->delete('user4/(:any)', [KasirController::class, 'destroy'], ['filter' => 'role:kasir']);
