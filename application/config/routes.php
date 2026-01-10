<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Principal';

$route['registrar'] = 'registrar';

$route['registrar/guardar'] = 'registrar/guardar';

$route['login'] = 'login';

$route['logout'] = 'logout';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['formulario_registro'] = 'Registrar/index';

$route['formulario_login'] = 'Login/index';

$route['login/autenticar'] = 'login/autenticar';

$route['politicas/privacidad'] = 'politicas/privacidad';

$route['politicas/terminos'] = 'politicas/terminos';

$route['usuario/index'] = 'Usuario/index';

$route['reservas/procesar/(:num)'] = 'Reservas/procesar/$1';

$route['reservas/reservar/(:num)'] = 'Reservas/reservar/$1';

