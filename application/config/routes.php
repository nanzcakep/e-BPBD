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

//landingpages
$route['test'] = 'Welcome/test';


//dashboard
$route['admin/dashboard'] = 'DashboardController/index';



//bencana routes
$route['admin/dashboard/bencana'] = 'BencanaController/index';
$route['admin/dashboard/bencana/detail/(:num)'] = 'BencanaController/detail/$1';
$route['admin/dashboard/bencana/tambah'] = 'BencanaController/tambah';
$route['admin/dashboard/bencana/update/(:num)'] = 'BencanaController/update/$1';
$route['admin/dashboard/bencana/delete/(:num)'] = 'BencanaController/delete/$1';


//posko routes
$route['admin/dashboard/posko'] = 'PoskoController/index';
$route['admin/dashboard/posko/detail/(:num)'] = 'PoskoController/detail/$1';
$route['admin/dashboard/posko/tambah'] = 'PoskoController/tambah';
$route['admin/dashboard/posko/update/(:num)'] = 'PoskoController/update/$1';
$route['admin/dashboard/posko/delete/(:num)'] = 'PoskoController/delete/$1';

//pengungsi routes
$route['admin/dashboard/pengungsi'] = 'PengungsiController/index';
$route['admin/dashboard/pengungsi/detail/(:num)'] = 'PengungsiController/detail/$1';
$route['admin/dashboard/pengungsi/tambah'] = 'PengungsiController/tambah';
$route['admin/dashboard/pengungsi/update/(:num)'] = 'PengungsiController/update/$1';
$route['admin/dashboard/pengungsi/delete/(:num)'] = 'PengungsiController/delete/$1';


//kebutuhan routes
$route['admin/dashboard/kebutuhan-posko'] = 'KebutuhanPoskoController/index';
$route['admin/dashboard/kebutuhan-posko/detail/(:num)'] = 'KebutuhanPoskoController/detail/$1';
$route['admin/dashboard/kebutuhan-posko/tambah'] = 'KebutuhanPoskoController/tambah';
$route['admin/dashboard/kebutuhan-posko/update/(:num)'] = 'KebutuhanPoskoController/update/$1';
$route['admin/dashboard/kebutuhan-posko/delete/(:num)'] = 'KebutuhanPoskoController/delete/$1';


//donasi routes
$route['admin/dashboard/donasi'] = 'DonasiController/index';
$route['admin/dashboard/donasi/(:num)'] = 'DonasiController/donasi/$1';
$route['admin/dashboard/donasi/kuy'] = 'DonasiController/donasi';
$route['admin/dashboard/donasi/detail/(:num)'] = 'DonasiController/update/$1';

//UserController
$route['dashboard'] = 'UserDashboardController/index';
$route['dashboard/posko'] = 'UserDashboardController/getAllPosko';
$route['dashboard/posko/detail/(:num)'] = 'UserDashboardController/getDetailPosko/$1';
$route['dashboard/bencana'] = 'UserDashboardController/getAllBencana';
$route['dashboard/bencana/detail/(:num)'] = 'UserDashboardController/getDetailBencana/$1';
$route['dashboard/donasi/(:num)'] = 'UserDashboardController/donasi/$1';
$route['dashboard/histori-donasi'] = 'UserDashboardController/getHistoriDonasi';
$route['dashboard/histori-donasi/(:num)'] = 'UserDashboardController/detailDonasi/$1';



//AuthController
$route['login'] = 'AuthController/index';
$route['register'] = 'AuthController/registrationView';
$route['auth/register'] = 'AuthController/register';
$route['auth/login'] = 'AuthController/login';
$route['auth/logout'] = 'AuthController/logout';