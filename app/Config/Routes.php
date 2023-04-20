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
//// !Semua Pengguna yang belum login
$routes->get('/', 'Home::index');
// $routes->get('/testadmin', 'Home::testadmin', ['filter' => 'role:admin']);
// $routes->get('/testuser', 'Home::testuser', ['filter' => 'role:admin,default']);
// $routes->get('/admin', 'Bsadmin::index');

//// !admin
// $routes->get('/admin', 'Bsadmin::index');
$routes->get('/admin', 'Bsadmin::index', ['filter' => 'role:admin']);
$routes->get('/admin/input', "Bsadmin::inputindex", ['filter' => 'role:admin']);
$routes->get('/admin/input/(:segment)', 'Bsadmin::inputview/$1', ['filter' => 'role:admin']); // menambahkan perm
$routes->post('/admin/input/(:segment)', 'Bsadmin::adddata/$1', ['filter' => 'role:admin']);  // menambahkan perm

//// !user
$routes->get('/user', 'UsersController::index', ['filter' => 'role:default,admin']); // user interface
$routes->get('/user/submit', 'UsersController::inputsoal', ['filter' => 'role:default,admin']); // mengirim soal

//// !validator soal
$routes->get('/admin/soal', 'UsersController::index', ['filter' => 'role:validatorSoal,admin']); // user interface
$routes->get('/admin/soal/detail/(:segment)', 'UsersController::inputsoal', ['filter' => 'role:validatorSoal,admin']); // mengirim soal


//// !Apiv1
// $routes->resource('apiv1');
$routes->get('/api/v1/', 'Apiv1::index');
$routes->get('/api/v1/randomsoal', 'Apiv1::randomsoal'); // random soal dari DB
// $routes->get('/api/v1/soalset', 'Apiv1::soalset'); // random soal dari DB

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
