<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = 'Custom404Controller';
$route['translate_uri_dashes'] = FALSE;


//bencana routes
$route['dashboard/bencana'] = 'BencanaController/index';
$route['dashboard/bencana/detail/(:num)'] = 'BencanaController/detail/$1';
$route['dashboard/bencana/tambah'] = 'BencanaController/tambah';
$route['dashboard/bencana/update/(:num)'] = 'BencanaController/update/$1';
$route['dashboard/bencana/delete/(:num)'] = 'BencanaController/delete/$1';


//posko routes
$route['dashboard/posko'] = 'PoskoController/index';
$route['dashboard/posko/detail/(:num)'] = 'PoskoController/detail/$1';
$route['dashboard/posko/tambah'] = 'PoskoController/tambah';
$route['dashboard/posko/update/(:num)'] = 'PoskoController/update/$1';
$route['dashboard/posko/delete/(:num)'] = 'PoskoController/delete/$1';

//pengungsi routes
$route['dashboard/pengungsi'] = 'PengungsiController/index';
$route['dashboard/pengungsi/detail/(:num)'] = 'PengungsiController/detail/$1';


//kebutuhan routes
$route['dashboard/kebutuhan-posko'] = 'KebutuhanPoskoController/index';
$route['dashboard/kebutuhan-posko/detail/(:num)'] = 'KebutuhanPoskoController/detail/$1';
$route['dashboard/kebutuhan-posko/tambah'] = 'KebutuhanPoskoController/tambah';
$route['dashboard/kebutuhan-posko/delete/(:num)'] = 'KebutuhanPoskoController/delete/$1';


//donasi routes
$route['donasi'] = 'DonasiController/index';
$route['donasi/(:num)'] = 'DonasiController/donasi/$1';
$route['donasi/kuy'] = 'DonasiController/donasi';