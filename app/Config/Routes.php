<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');

/* auth */
$routes->get('auth', 'Auth::index');
$routes->get('logout', 'Auth::logout');
$routes->post('validasi', 'Auth::validation');

/* user */
$routes->get('users', 'UserController::index');
$routes->get('users/add', 'UserController::add');
$routes->get('users/edit/(:any)', 'UserController::edit/$1');
$routes->get('users/profile', 'UserController::profile');

$routes->post('users/save-profile', 'UserController::saveDataProfile');
$routes->post('users/save', 'UserController::save');
$routes->post('users/update-password', 'UserController::updatePassword');
$routes->post('users/delete', 'UserController::deleteUser');

/* MAP */
$routes->get('gis', 'GisController::index');
$routes->get('gis/map', 'GisController::map');
$routes->get('gis/add', 'GisController::add');
$routes->get('gis/edit/(:any)', 'GisController::edit/$1');

$routes->post('gis/save', 'GisController::save');
$routes->post('gis/filter-peta', 'GisController::cariLokasi');
$routes->post('gis/detail-peta', 'GisController::detailLokasi');
$routes->post('gis/delete', 'GisController::delete');

/* AJAX */
$routes->get('ajax-map', 'GisController::ajaxMap');
$routes->get('ajax-map-detil/(:any)', 'GisController::ajaxMapDetil/$1');
$routes->get('ajax-get-desa/(:any)', 'GisController::ajaxGetDesa/$1');
