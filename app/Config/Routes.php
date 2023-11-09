<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


#ADMIN_GUDANG
$routes->get('/barang/(:any)/(:any)/(:any)/(:any)', 'BarangController::barang/$1/$2/$3/$4');
#create
$routes->get('/barang/add', 'BarangController::add');
$routes->post('/barang/store', 'BarangController::store');
#table
$routes->get('/barang/table', 'BarangController::table');

#KASIR
$routes->get('/penjualan/(:any)/(:any)/(:any)/(:any)', 'KasirController::penjualan/$1/$2/$3/$4');
#create
$routes->get('/penjualan/add', 'KasirController::add');
$routes->post('/penjualan/store', 'KasirController::store');
#table
$routes->get('/penjualan/table', 'KasirController::table');

#JENIS BARANG
$routes->get('/jenis', 'BarangController::jenis');
$routes->get('/jenis/add', 'BarangController::add_jenis');

$routes->get('/login', 'Home::login');
