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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'home';

$route['thumbs/(:any)/(:any)/(:any)'] = 'source/cropimage/$1/$2/$3';

$route['thumbs2/(:any)/(:any)/(:any)'] = 'source/cropimage2/$1/$2/$3';

$route['admin/(:any)/(:any)/(:any)'] = 'admin/$1/$2/$3';
$route['admin/(:any)/(:any)'] = 'admin/$1/$2';
$route['admin/(:any)'] = 'admin/$1';
$route['admin/home'] = 'admin/home';
$route['admin'] = 'admin/home/login';

$route['site'] = 'site/page/home';
$route['site/(:any)'] = 'site/page/$1';
$route['site/(:any)/(:any)'] = 'site/page/$1/$2';

$route['site/(:any)/(:any)/(:any)'] = 'site/page/$1/$2/$3';
$route['site/(:any)/(:any)/(:any)/(:any)'] = 'site/page/$1/$2/$3/$4';

$route['formulario/(:any)'] = 'formulario/$1';
$route['result/(:any)'] = 'result/$1';
$route['site/cita-en-linea'] = 'site/page/cita_en_linea';
$route['site/cita-on-linea'] = 'site/page/cita_on_linea';
$route['site/coberturas'] = 'site/page/coberturas_mltd';

$route['site/suscripcion-gracias'] = 'site/page/suscripcion_gracias';
$route['site/blanqueamiento-dental'] = 'site/page/blanqueamiento_dental';
$route['site/carillas-de-porcelana'] = 'site/page/carillas_porcelana';
$route['site/coronas-dentales'] = 'site/page/coronas_dentales';
$route['site/implantes-dentales'] = 'site/page/implantes_dentales';
$route['site/tratamiento-de-ortodoncia'] = 'site/page/tratamiento_ortodoncia';
$route['site/politicas-privacidad'] = 'site/page/politicas_privacidad';
$route['site/diseno-de-sonrisa'] = 'site/page/diseno_de_la_sonrisa';
$route['site/periodoncia'] = 'site/page/periodoncia';
$route['site/coronas-y-puentes'] = 'site/page/coronas_y_puentes';
$route['site/ortodoncia'] = 'site/page/ortodoncia';

$route['404_override'] = 'error404';
$route['translate_uri_dashes'] = FALSE;
