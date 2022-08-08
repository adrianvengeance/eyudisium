<?php

namespace Config;

use CodeIgniter\Commands\Utilities\Routes;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('/find', 'Home::cari');

$routes->get('/alur', 'Home::info');
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->post('/registerprocess', 'Auth::registerprocess');
$routes->get('/registermahasiswa', 'Auth::findmhs');
$routes->post('/findmhs', 'Auth::findmhsprocess');
$routes->get('/registermahasiswa/create', 'Auth::createmhs');
$routes->post('/createmhsprocess', 'Auth::createmhsprocess');
$routes->get('/profile', 'Auth::profile');
$routes->get('/profile/edit', 'Auth::changepass');
$routes->post('/profile/edit/changepassprocess', 'Auth::changepassprocess');

$routes->get('/mahasiswa', 'Mahasiswa::index');
$routes->post('/mahasiswa/save/', 'Mahasiswa::save');
$routes->get('/mahasiswa/done/', 'Mahasiswa::done');

$routes->post('/loginprocess', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');

$routes->get('/user', 'User::index');
$routes->get('/user/data', 'User::data');
$routes->post('/user/dataupdate', 'User::dataupdate');
$routes->get('/user/profilemahasiswa/(:num)', 'User::mhsprofile/$1');
$routes->post('/user/mhsprofilecheck/(:num)', 'User::mhsprofilecheck/$1');
$routes->get('/user/list', 'User::listCalon');
$routes->get('/user/set', 'User::set');
$routes->post('/user/setperiode/(:any)', 'User::setperiode/$1');
$routes->get('/user/data/ajukandariprodi', 'User::ajukandariprodi');
$routes->get('/user/data/ajukandarifakultas', 'User::ajukandarifakultas');
$routes->get('/user/data/ajukandaribaak', 'User::ajukandaribaak');

$routes->delete('/user/data/tidakmemenuhi', 'User::tidakmemenuhi');
$routes->delete('/user/data/tolak/(:num)', 'User::tolakpengajuan/$1');
$routes->delete('/user/reject/(:num)/(:segment)/(:segment)', 'User::rejectberkas/$1/$2/$3');
$routes->delete('/user/list/clear', 'User::clearpesertayudisium');

$routes->get('/user/submitted', 'User::listdiajukan');

$routes->get('/user/history', 'User::yudisiumhistory');
$routes->get('/user/history/profile/(:num)', 'User::historyprofile/$1');

// $routes->get('/user/berkas/(:num)/(:segment)', 'User::previewfile/$1/$2');
$routes->get('/user/berkas/dataalumni/(:num)/(:segment)', 'User::previewdataalumnifile/$1/$2');
$routes->get('/user/berkas/(:num)/(:segment)/(:segment)', 'User::previewberkasfile/$1/$2/$3');
// $routes->get('/user/berkas/(:any)', 'User::previewfile/$1');

$routes->get('/usermhs', 'Usermhs::index');
$routes->get('/user/mahasiswa', 'Usermhs::index');
$routes->get('/user/mahasiswa/alumni', 'Usermhs::dataalumni');
$routes->post('/user/mahasiswa/alumniprocess', 'Usermhs::dataalumniprocess');

$routes->get('/user/mahasiswa/berkas', 'Berkas::index');
$routes->post('/user/mahasiswa/berkas/foto', 'Berkas::fotowarna');
$routes->post('/user/mahasiswa/berkas/fotobw4x5', 'Berkas::fotobw4x5');
$routes->post('/user/mahasiswa/berkas/fotobw4x6', 'Berkas::fotobw4x6');
$routes->post('/user/mahasiswa/berkas/ktm', 'Berkas::ktm');
$routes->post('/user/mahasiswa/berkas/suketadmkeuangan', 'Berkas::suketadmkeuangan');
$routes->post('/user/mahasiswa/berkas/suketpenyerahanskripsi', 'Berkas::suketpenyerahanskripsi');
$routes->post('/user/mahasiswa/berkas/suketsumbanganbuku', 'Berkas::suketsumbanganbuku');
$routes->post('/user/mahasiswa/berkas/suketperpusda', 'Berkas::suketperpusda');
$routes->post('/user/mahasiswa/berkas/suketperpusupy', 'Berkas::suketperpusupy');
$routes->post('/user/mahasiswa/berkas/daftarnilai', 'Berkas::daftarnilai');
$routes->post('/user/mahasiswa/berkas/suketperubahanidentitas', 'Berkas::suketperubahanidentitas');
$routes->post('/user/mahasiswa/berkas/sertifept', 'Berkas::sertifept');
$routes->post('/user/mahasiswa/berkas/sertifujikomp', 'Berkas::sertifujikomp');
$routes->post('/user/mahasiswa/berkas/ktp', 'Berkas::ktp');
$routes->post('/user/mahasiswa/berkas/aktalahir', 'Berkas::aktalahir');
$routes->post('/user/mahasiswa/berkas/ijazah', 'Berkas::ijazah');

$routes->get('/user/mahasiswa/pengajuan/(:num)', 'Usermhs::pengajuan/$1');
$routes->get('/user/mahasiswa/download/alumni/', 'Usermhs::downalumni');
// $routes->get('/user/mahasiswa/download/alumni/test', 'Usermhs::downalumnitest');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
