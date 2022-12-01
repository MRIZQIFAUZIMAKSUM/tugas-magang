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

$routes->get('/', 'Dashboard::index');
$routes->post('/authlogin', 'login::prosesLogin');
$routes->post('/authregister', 'login::prosesRegister');
$routes->get('/dashboard', 'dashboard::index');
$routes->get('/profile', 'profile::index');
$routes->get('/settings', 'settings::index');
$routes->get('/uploadktp', 'uploadktp::index');
$routes->get('/uploadpp', 'settings::pp');
$routes->post('/uploadktp', 'uploadktp::uploadktp');
$routes->post('/imgprofile', 'settings::imgprofile');
$routes->get('/changepswd', 'changepswd::index');
$routes->post('/changepswd', 'changepswd::change_pass');
$routes->get('/mitra-list', 'Manage::mitra', ['filter' => 'role:admin,super admin'] );
$routes->get('/staff-list', 'Manage::staff', ['filter' => 'role:admin,super admin'] );
$routes->get('/user-list', 'Manage::user', ['filter' => 'role:admin,super admin'] );
$routes->get('/admin-list', 'Manage::admin', ['filter' => 'role:super admin'] );

$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin'] );
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin'] );
$routes->get('/user', 'User::index', ['filter' => 'role:user'] );
$routes->get('/user/index', 'User::index', ['filter' => 'role:user'] );
$routes->get('/superadmin', 'SuperAdmin::index', ['filter' => 'role:super admin'] );
$routes->get('/superadmin/index', 'SuperAdmin::index', ['filter' => 'role:super admin'] );
$routes->get('/mitra', 'Mitra::index', ['filter' => 'role:mitra'] );
$routes->get('/mitra/index', 'Mitra::index', ['filter' => 'role:mitra'] );
$routes->get('/staff', 'Staff::index', ['filter' => 'role::staff'] );
$routes->get('/staff/index', 'Staff::index', ['filter' => 'role::staff'] );

$routes->get('/detail', 'Admin::detail/$1', ['filter' => 'role:admin, super admin']);
$routes->get('/detail/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin, super admin']);

$routes->get('/add-user', 'Manage::createindex', ['filter' => 'role:admin,super admin']);
$routes->post('/add-user', 'Manage::create', ['filter' => 'role:admin,super admin']);
$routes->get('/detail/(:segment)/edit', 'Manage::editindex/$1', ['filter' => 'role:admin,super admin']);
$routes->put('/detail/(:segment)/edit', 'Manage::edit/$1', ['filter' => 'role:admin,super admin']);
$routes->delete('/detail/(:segment)/delete', 'Manage::delete/$1', ['filter' => 'role:admin,super admin']);

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
