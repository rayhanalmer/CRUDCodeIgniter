<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
// $routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
// $routes->setTranslateURIDashes(false);
// $routes->set404Override();

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
$routes->get('/', 'Login::index');
$routes->get('/logout', 'Login::logout');
$routes->get('/register', 'Register::index');

$routes->get('/departemen?cari=(:string)', 'Departemen::index');
$routes->get('/departemen/create', 'Departemen::create');
$routes->post('/departemen/store', 'Departemen::store');
$routes->get('/departemen/edit/(:string)', 'Departemen::edit/$1');
$routes->post('/departemen/update/(:string)', 'Departemen::update/$1');
$routes->get('/departemen/delete/(:string)', 'Departemen::delete/$1');

$routes->get('/inventory_departemen?cari=(:string)', 'Inventory_departemen::index'); 
$routes->get('/inventory_departemen/(:string)', 'Inventory_departemen::find/$1');
$routes->get('/inventory_departemen/create', 'Inventory_departemen::create');
$routes->post('/inventory_departemen/store', 'Inventory_departemen::store');
$routes->get('/inventory_departemen/edit/(:string)', 'Inventory_departemen::edit/$1');
$routes->post('/inventory_departemen/update/(:string)', 'Inventory_departemen::update/$1');
$routes->get('/inventory_departemen/delete/(:string)', 'Inventory_departemen::delete/$1');

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
