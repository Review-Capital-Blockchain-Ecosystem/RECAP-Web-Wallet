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

Route::get('/', function () {
    return view('homePage');
});
Route::get('/privacy', function () {
    return view('privacy');
});
Route::get('/cookie', function () {
    return view('cookie');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/disclaimer', function () {
    return view('disclaimer');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/team', function () {
    return view('team');
});
Route::get('/media', function () {
    return view('media');
});

Route::post('/reset', 'Auth\ResetPasswordController@sendResetLinkEmail')->name('reset');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/wallet', 'HomeController@wallet')->name('wallet');
Route::get('/accounts', 'HomeController@accounts')->name('accounts');
Route::get('/security', 'HomeController@security')->name('security');

Route::post('/2fa')->name('2fa')->middleware('2fa', 'guest');

Route::post('/sendcoin', 'HomeController@sendcoin')->name('sendcoin');
Route::post('/accountupdate', 'HomeController@accountupdate')->name('accountupdate');
Route::post('/passchange', 'HomeController@passchange')->name('passchange');
Route::post('/enable2fa', 'HomeController@enable2fa')->name('enable2fa');
Route::post('/disable2fa', 'HomeController@disable2fa')->name('disable2fa');

Route::get('/proposal', 'HomeController@proposal')->name('proposal');
Route::post('/proposal', 'HomeController@proposalpost')->name('proposal');
Route::any('/proposalsubmit', 'HomeController@proposalsubmit')->name('proposalsubmit');
Route::get('/vote', 'HomeController@vote')->name('vote');
Route::get('/history', 'HomeController@history')->name('history');
