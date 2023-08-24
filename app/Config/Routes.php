<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('contact/sendEmail', 'KritikController::sendEmail');

// Login Admin
$routes->get('AdministratorSign-In', 'Auth::showLogin');
$routes->post('/login', 'Auth::login');

// Flexible
$routes->get('/logout', 'Auth::logout');
$routes->get('logoutExpertSystem', 'Auth::logoutExpertSystem');

// $routes->get('login-mahasiswa', 'Auth::showLoginMahasiswa');
// $routes->post('/login-mahasiswa', 'Auth::loginMahasiswa');
// $routes->get('register', 'Auth::register');
// $routes->post('register', 'Auth::register');

// Login Mahasiswa
$routes->get('login-mahasiswa', 'Auth::showLoginMahasiswa');
$routes->post('login-mahasiswa', 'Auth::loginMahasiswa');
$routes->get('login-google', 'Auth::loginGoogle');
$routes->get('login-google/callback', 'Auth::googleCallback');
$routes->get('register', 'RegisterController::register');
$routes->post('register', 'RegisterController::register');
$routes->get('verify-otp', 'RegisterController::verifyOTP');
$routes->post('verify-otp', 'RegisterController::verifyOTP');

// RESET PASSWORD
$routes->get('forgot-password', 'ResetPasswordController::forgotPassword');
$routes->post('forgot-password', 'ResetPasswordController::processForgotPassword');
$routes->get('reset-password/(:any)', 'ResetPasswordController::showResetForm/$1', ['as' => 'password.reset']);
$routes->post('reset-password', 'ResetPasswordController::reset', ['as' => 'password.update']);


$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'DashboardController::index');

    // Routes Gejala
    $routes->get('master_gejala', 'MasterGejalaController::index');
    $routes->get('master_gejala/new', 'MasterGejalaController::new');
    $routes->post('master_gejala/simpan', 'MasterGejalaController::simpan');
    $routes->get('master_gejala/edit/(:num)', 'MasterGejalaController::edit/$1');
    $routes->post('master_gejala/update/(:num)', 'MasterGejalaController::update/$1');
    $routes->match(['delete'], 'master_gejala/(:num)', 'MasterGejalaController::delete/$1');

    // Routes Penyakit
    $routes->get('master_penyakit', 'MasterPenyakitController::index');
    $routes->get('master_penyakit/new', 'MasterPenyakitController::new');
    $routes->post('master_penyakit/simpan', 'MasterPenyakitController::simpan');
    $routes->get('master_penyakit/edit/(:num)', 'MasterPenyakitController::edit/$1');
    $routes->post('master_penyakit/update/(:num)', 'MasterPenyakitController::update/$1');
    $routes->match(['delete'], 'master_penyakit/(:num)', 'MasterPenyakitController::delete/$1');

    //Routes Aturan
    $routes->get('master_aturan', 'MasterAturanController::index');
    $routes->get('master_aturan/new', 'MasterAturanController::new');
    $routes->post('master_aturan/simpan', 'MasterAturanController::simpan');
    $routes->get('master_aturan/edit/(:num)', 'MasterAturanController::edit/$1');
    $routes->post('master_aturan/update/(:num)', 'MasterAturanController::update/$1');
    $routes->delete('master_aturan/(:num)', 'MasterAturanController::delete/$1');

    // Routes Faq
    $routes->get('master_faq', 'MasterFaqController::index');
    $routes->get('master_faq/new', 'MasterFaqController::new');
    $routes->post('master_faq/simpan', 'MasterFaqController::simpan');
    $routes->get('master_faq/edit/(:num)', 'MasterFaqController::edit/$1');
    $routes->post('master_faq/update/(:num)', 'MasterFaqController::update/$1');
    $routes->match(['delete'], 'master_faq/(:num)', 'MasterFaqController::delete/$1');

    // Routes Laporan
    $routes->get('master_laporan', 'MasterLaporanController::index');
    $routes->get('master_laporan/lihat/(:num)', 'MasterLaporanController::lihat/$1');
    $routes->get('master_laporan/cetakExcel', 'MasterLaporanController::cetakExcel');
    $routes->get('master_laporan/cetakPdf', 'MasterLaporanController::cetakPdf');
    $routes->get('master_laporan/cetakLangsung', 'MasterLaporanController::cetakLangsung');
    $routes->get('master_laporan/truncateData', 'MasterLaporanController::truncateData');
    $routes->match(['delete'], 'master_laporan/(:num)', 'MasterLaporanController::delete/$1');
    $routes->get('master_laporan/unduhDiagnosa/(:any)', 'MasterLaporanController::unduhDiagnosa/$1');

    // Routes Admin & Mahasiswa
    $routes->get('master_admin', 'MasterUserController::index');
    $routes->match(['delete'], 'master_admin/(:num)', 'MasterUserController::delete/$1');
    $routes->get('master_admin/truncateData', 'MasterUserController::truncateData');
    $routes->get('master_user', 'MasterUserController::indexMahasiswa');
    $routes->match(['delete'], 'master_user/(:num)', 'MasterUserController::hapus/$1');
    $routes->get('master_user/truncateDataMahasiswa', 'MasterUserController::truncateDataMahasiswa');

    // OTP & Token
    $routes->get('master_otp', 'OTPController::index');
    $routes->match(['delete'], 'master_otp/(:num)', 'OTPController::delete/$1');
    $routes->get('master_otp/truncateData', 'OTPController::truncateData');
    $routes->get('master_token', 'OTPController::indexToken');
    $routes->match(['delete'], 'master_token/(:num)', 'OTPController::hapus/$1');
    $routes->get('master_token/truncateDataToken', 'OTPController::truncateDataToken');

});

$routes->group('mahasiswa', ['filter' => 'auth'], function ($routes) {

    // Routes Diagnosa
    $routes->get('cek_diagnosa', 'MasterDiagnosaController::cek');
    $routes->post('hasil_diagnosa', 'MasterDiagnosaController::hitung');
    $routes->get('diagnosa/cetak_diagnosa', 'MasterDiagnosaController::cetakDiagnosa');
    $routes->get('diagnosa/error', 'MasterDiagnosaController::errorPage');
    // $routes->get('diagnosa/hasil/(:num)', 'MasterDiagnosaController::hasil/$1');

});

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}