<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Landing
$route['default_controller'] = 'Landing';
$route['landing'] = 'Landing/index';
$route['landing/home'] = 'Landing/index';
$route['landing/fasilitas'] = 'Landing/fasilitas';
$route['landing/tentang'] = 'Landing/tentang';
$route['landing/hubungi'] = 'Landing/hubungi';
$route['landing/login'] = 'Landing/login';

// Auth
$route['auth'] = 'Auth/index';
$route['auth/proses_login'] = 'Auth/proses_login';
$route['auth/register'] = 'Auth/register';
$route['auth/proses_register'] = 'Auth/proses_register';
$route['auth/logout'] = 'Auth/logout';

// Booking
$route['booking'] = 'Booking/index';
$route['booking/fasilitas/(:any)'] = 'Booking/fasilitas/$1';
$route['booking/create/(:num)'] = 'Booking/create/$1';
$route['booking/proses_booking'] = 'Booking/proses_booking';
$route['booking/detail/(:num)'] = 'Booking/detail/$1';
$route['booking/riwayat'] = 'Booking/riwayat';
$route['booking/cancel/(:num)'] = 'Booking/cancel/$1';

// Admin
$route['admin'] = 'Admin/index';
$route['admin/dashboard'] = 'Admin/dashboard';
$route['admin/bookings'] = 'Admin/bookings';
$route['admin/bookings/(:any)'] = 'Admin/bookings/$1';
$route['admin/update_status/(:num)'] = 'Admin/update_status/$1';
$route['admin/fasilitas'] = 'Admin/fasilitas';
$route['admin/add_fasilitas'] = 'Admin/add_fasilitas';
$route['admin/save_fasilitas'] = 'Admin/save_fasilitas';
$route['admin/edit_fasilitas/(:num)'] = 'Admin/edit_fasilitas/$1';
$route['admin/update_fasilitas/(:num)'] = 'Admin/update_fasilitas/$1';
$route['admin/delete_fasilitas/(:num)'] = 'Admin/delete_fasilitas/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
