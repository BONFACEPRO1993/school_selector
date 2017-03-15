<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// To view counties
$route['counties'] = 'counties/index';
//To go to Home Page
$route['default_controller'] = 'pages/view';
// To pass static pages without adding the whole path on URL
$route['(:any)']='pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
