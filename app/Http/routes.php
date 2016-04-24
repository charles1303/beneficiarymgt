<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('createbeneficiary',
        ['as' => 'createbeneficiary', 'uses' => 'BeneficiaryController@create']);
    Route::post('createbeneficiary',
        ['as' => 'createbeneficiary', 'uses' => 'BeneficiaryController@store']);
    Route::get('pendingcases',
        ['as' => 'pendingcases', 'uses' => 'BeneficiaryCaseController@index']);


   	Route::get('createcase',
        ['as' => 'createcase', 'uses' => 'BeneficiaryCaseController@create']);

    Route::get('updatecase',
        ['as' => 'updatecase', 'uses' => 'BeneficiaryCaseController@getCase']);

    Route::post('createcase',
        ['as' => 'createcase', 'uses' => 'BeneficiaryCaseController@createCase']);

   	Route::get('searchbeneficiary',
        ['as' => 'searchbeneficiary', 'uses' => 'BeneficiaryController@searchBeneficiary']);

    Route::get('getbeneficiary',
        ['as' => 'getbeneficiary', 'uses' => 'BeneficiaryController@BeneficiaryById']);

    Route::get('searchcaseofficer',
        ['as' => 'searchcaseofficer', 'uses' => 'UserController@searchCaseOfficer']);
});

/*
// Authentication Routes...
$this->get('login', 'Auth\AuthController@showLoginForm');
$this->post('login', 'Auth\AuthController@login');
$this->get('logout', 'Auth\AuthController@logout');

// Registration Routes...
$this->get('register', 'Auth\AuthController@showRegistrationForm');
$this->post('register', 'Auth\AuthController@register');

// Password Reset Routes...
$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('password/reset', 'Auth\PasswordController@reset');

*/
