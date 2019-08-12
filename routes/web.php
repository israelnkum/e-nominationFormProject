<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use SimpleSoftwareIO\QrCode\Facades\QrCode;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('home','HomeController');


Route::get('qr-code', function () {
    QrCode::format('png')->merge(public_path('assets/img/logo.png'), 0.3, true)
        ->size(500)->errorCorrection('H')
        ->generate('This is Osikani israel',public_path('assets/qr_codes/osddddddi.png'));
 /*QrCode::format('png')->merge('/public/assets/logo.png', .3,true)->generate('This is itThis is itThis is itThis is itThis is itThis is itThis is it',public_path('assets/qr_codes/osddddddi.png'));
    QrCode::generate('Make me into a QrCode!', public_path('assets/qr_codes/osi.svg'));*/
});
