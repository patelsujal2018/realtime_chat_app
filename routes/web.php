<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/login','AuthController@loginPage')->name('auth.login.page');
Route::post('/login','AuthController@loginProcess')->name('auth.login');
Route::get('/logout','AuthController@logoutProcess')->name('auth.logout');

Route::get('/register','AuthController@registrationPage')->name('auth.register.page');
Route::post('/register','AuthController@registrationProcess')->name('auth.register');
Route::get('/verify/register/{email}/{token}','AuthController@verifyRegistrationProcess')->name('auth.verify.register');

Route::group(['prefix'=>'account','middleware'=>['auth','prevent-back-history']],function(){

    Route::get('dashboard','DashboardController@dashboard')->name('account.dashboard');

    Route::get('chat','ChatController@index')->name('account.chat');

});
