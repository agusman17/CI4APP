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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/register', 'Auth\RegisterController::index');
$routes->post('/register', 'Auth\RegisterController::save');
$routes->get('/confirm_registration', 'Auth\RegisterController::verifyAccount');
$routes->get('/forgot_password', 'Auth\ForgotPasswordController::index');

$routes->get('/login', 'Auth\LoginController::index');
$routes->post('/auth', 'Auth\LoginController::auth');
$routes->get('/logout', 'Auth\LoginController::logout');

$routes->get('/', 'DashboardController::index', ['filter' => 'auth']);

$routes->group("user", ["filter" => "auth"], function ($routes) {
    $routes->get('/', 'User\UserController::index');
    $routes->get('getTable', 'User\UserController::getTable');
    $routes->get('create', 'User\UserController::create');
    $routes->get('edit/(:any)', 'User\UserController::edit/$1');

    $routes->post('/', 'User\UserController::save');
    $routes->put('(:any)', 'User\UserController::update/$1');
    $routes->delete('(:any)', 'User\UserController::delete/$1');
});

$routes->group("role", ["filter" => "auth"], function ($routes) {
    $routes->get('/', 'User\RoleController::index');
    $routes->get('create', 'User\RoleController::create');
    $routes->get('edit/(:any)', 'User\RoleController::edit/$1');

    $routes->post('/', 'User\RoleController::save');
    $routes->put('(:any)', 'User\RoleController::update/$1');
    $routes->delete('(:any)', 'User\RoleController::delete/$1');
});
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
