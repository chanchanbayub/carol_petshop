<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'users\HomeController::index');
$routes->get('/category/(:any)', 'users\HomeController::category/$1');
$routes->get('/detail_produk/(:any)', 'users\HomeController::detail/$1');

$routes->get('/shop', 'users\ShopController::index');

$routes->get('/administrator/dashboard', 'admin\Dashboard::index');
$routes->get('/administrator/category', 'admin\CategoryController::index');
$routes->post('/administrator/save/category', 'admin\CategoryController::save');
$routes->post('/administrator/edit/category', 'admin\CategoryController::edit');
$routes->post('/administrator/update/category', 'admin\CategoryController::update');
$routes->post('/administrator/delete/category', 'admin\CategoryController::delete');

$routes->get('/administrator/product', 'admin\ProductController::index');
$routes->post('/administrator/save/product', 'admin\ProductController::save');
$routes->post('/administrator/edit/product', 'admin\ProductController::edit');
$routes->get('/administrator/edit_product/(:any)', 'admin\ProductController::edit_product/$1');
$routes->post('/administrator/update/product', 'admin\ProductController::update');
$routes->post('/administrator/delete/product', 'admin\ProductController::delete');

$routes->get('/administrator/profile_toko', 'admin\ProfileToko::index');
$routes->post('/administrator/save/profile_toko', 'admin\ProfileToko::save');
$routes->post('/administrator/edit/profile_toko', 'admin\ProfileToko::edit');
$routes->post('/administrator/update/profile_toko', 'admin\ProfileToko::update');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
