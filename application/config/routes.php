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
$route['default_controller'] = 'bienvenida/principal';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['principal'] = 'bienvenida/principal';
$route['login'] = 'bienvenida/login';
$route['logout'] = 'bienvenida/logout';

$route['lista_usuarios'] = 'usuarios/lista_usuarios';
$route['registra_usuarios'] = 'usuarios/registra_usuarios';
$route['modifica_usuarios/(:any)'] = 'usuarios/modifica_usuarios/$1';

$route['lista_clientes'] = 'clientes/lista_clientes';
$route['registra_clientes'] = 'clientes/registra_clientes';
$route['modifica_clientes/(:any)'] = 'clientes/modifica_clientes/$1';

$route['lista_laboratorios'] = 'laboratorios/lista_laboratorios';
$route['registra_laboratorios'] = 'laboratorios/registra_laboratorios';
$route['modifica_laboratorios/(:any)'] = 'laboratorios/modifica_laboratorios/$1';

$route['lista_productos'] = 'productos/lista_productos';
$route['registra_productos'] = 'productos/registra_productos';
$route['modifica_productos/(:any)'] = 'productos/modifica_productos/$1';

$route['ventas'] = 'ventas/registra_ventaproducto';
$route['registra_clienteventa'] = 'ventas/registra_clienteventa';
$route['registra_venta'] = 'ventas/registra_venta';
$route['elimina_ventaproducto/(:any)'] = 'ventas/elimina_ventaproducto/$1';
$route['elimina_venta'] = 'ventas/elimina_venta';
$route['finaliza_venta'] = 'ventas/finaliza_venta';
$route['ticket_pdf/(:any)'] = 'ventas/ticket_pdf/$1';

$route['top_productos'] = 'reportes/top_productos';
$route['top_productos_ajax'] = 'reportes/top_productos_ajax';
$route['venta_diario'] = 'reportes/venta_diario';
$route['venta_diario_ajax'] = 'reportes/venta_diario_ajax';
$route['venta_mensual'] = 'reportes/venta_mensual';
$route['venta_mensual_ajax'] = 'reportes/venta_mensual_ajax';
$route['venta_anual'] = 'reportes/venta_anual';
$route['venta_anual_ajax'] = 'reportes/venta_anual_ajax';
$route['rentabilidad_trimestral'] = 'reportes/rentabilidad_trimestral';
$route['rentabilidad_trimestral_ajax'] = 'reportes/rentabilidad_trimestral_ajax';