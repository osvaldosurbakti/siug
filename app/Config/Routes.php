<?php

namespace Config;

use App\Controllers\HomeLelang;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->get('/homelelang', 'Home::homeLelang');
$routes->get('/admin', 'Admin::index');
$routes->get('/tambahbaranglelang', 'Adminlelang::create');
$routes->get('/adminlelang/tambahbaranglelang/(:segment)', 'Adminlelang::edit/$1');
$routes->get('/datatransaksi', 'Pelanggan::datatransaksi');
$routes->get('/pelanggan', 'Pelanggan::index');
$routes->get('/pelangganlelang', 'Pelanggan::pelangganlelang');
$routes->get('/perjanjiangadai', 'Pelanggan::perjanjiangadai');
$routes->get('/simpandatapelanggan', 'Admin::simpandatapelanggan');
$routes->get('/simpandatatransaksi', 'Admin::simpandatatransaksi');
$routes->get('/updatedatapelanggan', 'Admin::updatedatapelanggan');
$routes->get('/updatedatatransaksi', 'Admin::updatedatatransaksi');
$routes->get('/updatebaranglelang', 'Adminlelang::updatebaranglelang');
$routes->get('/tebusbarang', 'Pelanggan::tebusbarang');
$routes->delete('/adminlelang/(:num)', 'Adminlelang::delete/$1');
$routes->get('/updatebaranglelang/(:num)', 'Adminlelang::edit/$1');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
