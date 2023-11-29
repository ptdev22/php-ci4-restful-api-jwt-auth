<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->post('register', 'Auth::register');
$routes->post('login', 'Auth::login');

// $routes->post('client/', 'Home::index');

$routes->get('client', 'Client::showAll');
$routes->post('client', 'Client::store');
$routes->get('client/(:num)', 'Client::show/$1');
$routes->post('client/(:num)', 'Client::update/$1');
$routes->delete('client/(:num)', 'Client::destroy/$1');