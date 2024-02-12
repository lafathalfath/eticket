<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/* USER
** path ---- > folder / controller / method
*/

// Login
// $route['masuk'] = 'masuk/';
$route['keluar'] = 'masuk/do_logout';

/* ADMIN
** path ---- > folder / controller / method
*/
$route['dashboard'] = 'admin/dashboard';

// Admin Profile Menu
$route['profile'] = 'admin/profile';
$route['profile/gantipassword'] = 'admin/profile/gantipassword';

// Admin List Laporan Menu
$route['listlaporan'] = 'admin/listlaporan';
$route['listlaporan/templatejawaban'] = 'admin/listlaporan/templatejawaban';
$route['listlaporan/ketikjawaban'] = 'admin/listlaporan/ketikjawaban';

// Admin Task Management Menu
$route['taskmanagement'] = 'admin/taskmanagement/workload';
$route['taskmanagement/arahkanlaporan'] = 'admin/taskmanagement/arahkanlaporan';
$route['taskmanagement/detailworkload'] = 'admin/taskmanagement/detailworkload';
$route['taskmanagement/detailworkloadtask'] = 'admin/taskmanagement/detailworkloadtask';

// Admin Reporting Menu
$route['reporting/laporansmlit'] = 'admin/reporting/laporansmlit';
$route['reporting/laporantiappersonil'] = 'admin/reporting/laporantiappersonil';

// Admin Master Data Menu
$route['masterdata/datapersonil'] = 'admin/masterpersonil/datapersonil';
$route['masterdata/datapegawai'] = 'admin/masterpersonil/datapegawai';

// Admin FAQ
$route['listfaq'] = 'admin/faq';
$route['listfaq/addfaq'] = 'admin/faq/addfaq';
$route['listfaq/editfaq'] = 'admin/faq/editfaq';
$route['listfaq/detailfaq'] = 'admin/faq/detailfaq';

/* AUTH Admin
** path ---- > folder / controller / method
*/

// Auth Menu Admin
$route['logout']  = 'kelola/do_logout';


/* FRONT USER
** path ---- > folder / controller / method
*/

// $route[''] = 'home/home/index';

// Tata Cara Menu
$route['tatacara'] = 'home/home/tatacara';

// Server Menu
$route['server'] = 'home/home/server';

// FAQ Menu
$route['faq'] = 'home/faq';
$route['faqresult'] = 'home/faq/faqresult';
$route['faqresult/(:any)'] = 'home/faq/faqresult';
$route['faqanswer/(:any)'] = 'home/faq/faqanswer/$1';
