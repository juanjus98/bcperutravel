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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'paginas/index';
$route['inicio'] = 'paginas/index';

/**
 * Categorias
 */
require_once( BASEPATH .'database/DB.php');
$db =& DB();
$query = $db->where( 'publico', 1 )->get( 'categoria' );
$result = $query->result();
foreach( $result as $row )
{
    $route[ $row->url_key ] 		= 'paginas/pagina';
    $route[ $row->url_key.'/:any' ] = 'paginas/pagina';
    /*$route[ $row->controller ]           = 'error404';
    $route[ $row->controller.'/:any' ]   = 'error404';*/
}

/**
 * Páginas
 */
$route['buscar'] = 'paginas/buscar';

$route['c/(:any)'] = 'paginas/productos/$1';
$route['c/(:any)/(:num)'] = 'paginas/productos/$1/$2'; //Paginación

$route['c/(:any)/(:any)'] = 'paginas/productos_ambito/$1/$2'; //Por ambito (nacional/internacional)
$route['c/(:any)/(:any)/(:num)'] = 'paginas/productos_ambito/$1/$2/$3'; //Paginación

$route['p/(:num)-(:any)'] = 'paginas/productos_ciudad/$1/$2';
$route['p/(:num)-(:any)/(:num)'] = 'paginas/productos_ciudad/$1/$2/$3'; //Paginación

/**
 * Detalle del producto
 */
$route['s/(:any)'] = 'paginas/detalle/$1';

/*$route['c/(:any)'] = 'paginas/productos/$1';
$route['c/(:any)/(:num)'] = 'paginas/productos/$1/$2'; //Paginación
$route['p/(:any)'] = 'paginas/detalle_producto/$1'; //Detalles de un producto

$route['contactanos'] = 'paginas/contactanos';
$route['confirmacion'] = 'paginas/confirmacion';*/

/**
 * Carrusel
 */
$route['traslados-actividades-circuitos'] = 'paginas/carrusel';
$route['carrusellist'] = 'paginas/carrusellist';

/**
 * Utils
 */
$route['logos'] = 'utilidades/logos';

//Servicio servicio
/*$route['servicio/(:any)'] = 'paginas/servicio/$1';*/

/**
 * json
 */
$route['json/ciudades'] = 'ciudades_json/all';
$route['waadmin/json/transportes'] = 'waadmin/transportes/jsontransportes';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
* Admin routes
*/
$route['autenticar'] = "waadmin/waauth/autenticar";
$route['waadmin'] = "waadmin/waauth";
$route['waadmin/login'] = "waadmin/waauth";
$route['waadmin/salir'] = "waadmin/waauth/logout";
$route['waadmin/perfil/(:any)'] = "waadmin/Waauth/perfil";
$route['waadmin/website/(:any)/(:num)'] = "waadmin/website/editar/$1/$2";