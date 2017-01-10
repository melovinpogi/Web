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

$route['default_controller'] 		= "home";
$route['404_override'] 				= '';
$route['booster/(:any)/(:any)'] 	= 'home/promos';
$route['specials/(:any)/(:any)'] 	= 'home/promos';
$route['monthly/(:any)/(:any)'] 	= 'home/promos';
//$route['item/(:any)/(:any)/(:any)'] = 'home/item';
$route['verifycode/(:any)'] 		= 'home/verifycode';
$route['getproduct'] 				= 'home/cart';
$route['checkout'] 					= 'home/checkout';
$route['updatecart/(:any)/(:any)'] 	= 'home/updatecart';
$route['remove/(:any)'] 			= 'home/removecart';
$route['payment'] 					= 'home/payment';



/*Version 2 routes*/
$route['dining/(:any)/(:any)'] 		= 'item/category';
$route['living/(:any)/(:any)'] 		= 'item/category';
$route['giving/(:any)/(:any)'] 		= 'item/category';
$route['login'] 					= 'user/login';
$route['logout'] 					= 'user/logout';
$route['register'] 					= 'user/register';
$route['verifydistributor/(:any)'] 	= 'verifydistributor/verifydistributor';
$route['profile'] 					= 'user/profile';
$route['profile/changepassword'] 	= 'user/changepassword';

/* End of file routes.php */
/* Location: ./application/config/routes.php */