<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// $routes->setAutoRoute(true); // Aktifkan auto route sementara

$routes->get('/', 'Home::index');
// $routes->get('/admin', 'Admin::index');
$routes->get('/admin', 'Admin::index');

$routes->post('/admin/login', 'Admin::login');
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/logout', 'Admin::logout');
$routes->get('/home/profil', 'Home::profil');
$routes->get('/home/organisasi', 'Home::organisasi');
$routes->get('/home/informasi', 'Home::informasi');
$routes->get('/home/layanan', 'Home::layanan');
$routes->post('/home/layanan', 'Home::pengaduan');
$routes->get('/home/details/(:segment)', 'Home::details/$1');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'role:superadmin,admin'], function($routes) {
    $routes->get('posting', 'Posting::index');
    $routes->get('posting/create', 'Posting::create');
    $routes->get('posting/data', 'Posting::data');
    $routes->post('posting/store', 'Posting::store');
    $routes->get('posting/edit/(:num)', 'Posting::edit/$1');
    $routes->post('posting/update/(:num)', 'Posting::update/$1');
    $routes->post('posting/delete/(:num)', 'Posting::delete/$1');
    $routes->post('posting/deleteThumbnail/(:num)', 'Posting::deleteThumbnail/$1');
    $routes->post('posting/uploadImage', 'Posting::uploadImage');


});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'role:superadmin'], function($routes) {
    $routes->get('slider', 'Slider::index');
    $routes->get('slider/create', 'Slider::create');
    $routes->post('slider/store', 'Slider::store');
    $routes->get('slider/edit/(:num)', 'Slider::edit/$1');
    $routes->post('slider/update/(:num)', 'Slider::update/$1');
    $routes->post('slider/delete/(:num)', 'Slider::delete/$1');
    $routes->post('slider/deleteSlider/(:num)', 'Slider::deleteSlider/$1');
    $routes->get('pengumuman', 'Pengumuman::index');
    $routes->get('pengumuman/create', 'Pengumuman::create');
    $routes->post('pengumuman/store', 'Pengumuman::store');
    $routes->get('pengumuman/edit/(:num)', 'Pengumuman::edit/$1');
    $routes->post('pengumuman/update/(:num)', 'Pengumuman::update/$1');
    $routes->post('pengumuman/delete/(:num)', 'Pengumuman::delete/$1');
    $routes->post('pengumuman/deletePengumuman/(:num)', 'Pengumuman::deletePengumuman/$1');
    $routes->get('pengaturan/edit/(:num)', 'Pengaturan::edit/$1');
    $routes->post('pengaturan/update/(:num)', 'Pengaturan::update/$1');
    $routes->post('pengaturan/deletePengaturan/(:num)', 'Pengaturan::deletePengaturan/$1');
    $routes->post('pengaturan/deleteStruktur/(:num)', 'Pengaturan::deleteStruktur/$1');
    $routes->get('pejabat', 'Pejabat::index');
    $routes->get('pejabat/create', 'Pejabat::create');
    $routes->post('pejabat/store', 'Pejabat::store');
    $routes->get('pejabat/edit/(:num)', 'Pejabat::edit/$1');
    $routes->post('pejabat/update/(:num)', 'Pejabat::update/$1');
    $routes->post('pejabat/delete/(:num)', 'Pejabat::delete/$1');
    $routes->post('pejabat/deletePejabat/(:num)', 'Pejabat::deletePejabat/$1');
    $routes->get('pengaduan', 'Pengaduan::index');
    $routes->post('pengaduan/delete/(:num)', 'Pengaduan::delete/$1');
    $routes->get('pengaduan/lihat/(:num)', 'Pengaduan::lihat/$1');

});


$routes->group('editor', ['filter' => 'role:editor'], function ($routes) {
    $routes->get('review', 'Editor::reviewPost');
});





