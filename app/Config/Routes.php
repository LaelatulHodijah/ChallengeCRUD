<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('biodata', 'Biodata::index');
$routes->get('/', 'Biodata::index');
$routes->get('biodata/add', 'Biodata::add');
$routes->post('biodata/create', 'Biodata::create');
$routes->get('biodata/edit/(:num)', 'Biodata::edit/$1');
$routes->post('biodata/update/(:num)', 'Biodata::update/$1');
$routes->get('biodata/destroy/(:num)', 'Biodata::destroy/$1');
