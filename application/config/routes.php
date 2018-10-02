<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['posts'] = 'posts/index';
$route['default_controller'] = 'pages/view';
//anything after any
//ciblog/ anything will go to pages.view
//but we have to create default home.php
//$1 represents anything
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
