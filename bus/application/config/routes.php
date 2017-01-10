<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] = 'user/index';
$route['404_override'] = '';

/*admin*/
$route['admin'] = 'user/index';
$route['admin/signup'] = 'user/signup';
$route['admin/create_member'] = 'user/create_member';
$route['admin/login'] = 'user/index';
$route['admin/logout'] = 'user/logout';
$route['admin/login/validate_credentials'] = 'user/validate_credentials';

$route['admin/conductors'] = 'admin_conductors/index';
$route['admin/conductors/add'] = 'admin_conductors/add';
$route['admin/conductors/update'] = 'admin_conductors/update';
$route['admin/conductors/update/(:any)'] = 'admin_conductors/update/$1';
$route['admin/conductors/delete/(:any)'] = 'admin_conductors/delete/$1';
$route['admin/conductors/(:any)'] = 'admin_conductors/index/$1'; //$1 = page number

$route['admin/bus'] = 'admin_bus/index';
$route['admin/bus/add'] = 'admin_bus/add';
$route['admin/bus/update'] = 'admin_bus/update';
$route['admin/bus/update/(:any)'] = 'admin_bus/update/$1';
$route['admin/bus/delete/(:any)'] = 'admin_bus/delete/$1';
$route['admin/bus/(:any)'] = 'admin_bus/index/$1'; //$1 = page number


$route['admin/load'] = 'admin_load/index';
$route['admin/load/add'] = 'admin_load/add';
$route['admin/load/(:any)'] = 'admin_load/index/$1'; //$1 = page number

$route['admin/transaction'] = 'admin_transaction/index';
$route['admin/transaction/(:any)'] = 'admin_transaction/index/$1'; //$1 = page number

$route['admin/payment'] = 'admin_payment/index';
$route['admin/payment/(:any)'] = 'admin_payment/index/$1'; //$1 = page number




/* End of file routes.php */
/* Location: ./application/config/routes.php */