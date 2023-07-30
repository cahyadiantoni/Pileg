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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/suara_desa', 'Home::suara_desa');
$routes->get('/suara_tps/(:num)', 'Home::suara_tps/$1');
$routes->get('/laporan_suara/(:num)', 'Home::laporan_suara/$1');
$routes->get('/admin', [\App\Controllers\Admin\DashboardController::class, 'index']);
$routes->get('/desa', [\App\Controllers\Admin\DesaController::class, 'index']);
$routes->get('/data_petugas', [\App\Controllers\Admin\DataPetugasController::class, 'index']);
$routes->get('/data_kader', [\App\Controllers\Admin\DataKaderController::class, 'index']);
$routes->get('/data_simpatisan', [\App\Controllers\Admin\DataSimpatisanController::class, 'index']);
$routes->get('/input_suara', [\App\Controllers\Petugas\InputSuaraController::class, 'index']);
$routes->post('input_suara/upload', [\App\Controllers\Petugas\InputSuaraController::class, 'upload']);
$routes->get('/login', 'Login::index');


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
