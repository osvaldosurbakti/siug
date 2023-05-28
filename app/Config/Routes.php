<?php

namespace Config;


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
$routes->setAutoRoute(false);
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

$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);

// Admin routes
$routes->group("dashboard", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "AdminController::index", ['as' =>'adminHome']);
    $routes->get("admin/list", "AdminController::adminList", ['as' => 'adminList']);
    $routes->get("admin/add", "AdminController::adminAdd", ['as' => 'adminAdd']);
    $routes->post("admin/store", "AdminController::adminStore", ['as' => 'adminStore']);
    $routes->get("admin/edit/(:num)", "AdminController::adminEdit/$1", ['as' => 'adminEdit']);
    $routes->post("admin/update/(:num)", "AdminController::adminUpdate/$1", ['as' => 'adminUpdate']);
    $routes->delete("admin/delete/(:num)", "AdminController::adminDelete/$1", ['as' => 'adminDelete']);

    $routes->get("pelanggan/list", "PelangganController::list", ['as' => 'pelangganList']);
    $routes->get("pelanggan/add", "PelangganController::add", ['as' => 'pelangganAdd']);
    $routes->post("pelanggan/store", "PelangganController::store", ['as' => 'pelangganStore']);
    $routes->get("pelanggan/edit/(:num)", "PelangganController::edit/$1", ['as' => 'pelangganEdit']);
    $routes->post("pelanggan/update/(:num)", "PelangganController::update/$1", ['as' => 'pelangganUpdate']);
    $routes->delete("pelanggan/delete/(:num)", "PelangganController::delete/$1", ['as' => 'pelangganDelete']);
});
// Pelanggan routes
$routes->group("pelanggan", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "Pelanggan\HomeController::index", ['as' => 'userHome']);
});
$routes->get('logout', 'UserController::logout');

$routes->get('/', 'Home::index');
//$routes->get('/login', 'Login::index');
$routes->get('/homelelang', 'Home::homeLelang');
$routes->get('/admins', 'Admin::index');
$routes->get('/tambahbaranglelang', 'Adminlelang::create');
$routes->get('/adminlelang/tambahbaranglelang/(:segment)', 'Adminlelang::edit/$1');
$routes->get('/datatransaksi', 'Pelanggan::datatransaksi');
$routes->get('/pelanggans', 'Pelanggan::index');
$routes->get('/pelangganlelang', 'Pelanggan::pelangganlelang');
$routes->get('/perjanjiangadai', 'Pelanggan::perjanjiangadai');
$routes->get('/simpandatapelanggan', 'Admin::create');
$routes->post('/simpandatapelanggan', 'Admin::save');
$routes->get('/updatebaranglelang', 'Adminlelang::updatebaranglelang');
$routes->get('/tebusbarang', 'Pelanggan::tebusbarang');
$routes->delete('/adminlelang/(:num)', 'Adminlelang::delete/$1');
$routes->get('/updatebaranglelang/(:num)', 'Adminlelang::edit/$1');
$routes->get('/admin/updatedatapelanggan/(:num)', 'Admin::updatedatapelanggan/$1');
$routes->get('/admin/updatedatatransaksi/(:num)', 'Admin::updatedatatransaksi/$1');




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
