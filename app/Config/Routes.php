<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/db', 'Home::index');


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

$routes->get('/login', 'Home::password');
