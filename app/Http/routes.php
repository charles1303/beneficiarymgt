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

Route::group(['middleware' => ['web']], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('createbeneficiary',
        ['as' => 'createbeneficiary', 'uses' => 'BeneficiaryController@create'])->middleware('isactive');
    Route::post('createbeneficiary',
        ['as' => 'createbeneficiary', 'uses' => 'BeneficiaryController@store'])->middleware('isactive');
    Route::get('pendingcases',
        ['as' => 'pendingcases', 'uses' => 'BeneficiaryCaseController@index'])->middleware('isactive');

    Route::get('users',
        ['as' => 'users', 'uses' => 'AdminController@getAllUsers'])->middleware('isactive');

    Route::get('beneficiaries',
        ['as' => 'beneficiaries', 'uses' => 'AdminController@getAllBeneficiaries'])->middleware('isactive');

    Route::get('cases',
        ['as' => 'cases', 'uses' => 'AdminController@getAllBeneficiaryCases'])->middleware('isactive');
    Route::post('cases',
        ['as' => 'cases', 'uses' => 'AdminController@getAllBeneficiaryCases'])->middleware('isactive');

    Route::get('updateuser',
        ['as' => 'updateuser', 'uses' => 'UserController@getUser'])->middleware('isactive');

    Route::get('viewuser/{id}',
        ['as' => 'viewuser/{id}', 'uses' => 'UserController@viewUser'])->middleware('isactive');

    Route::post('updateuser',
        ['as' => 'updateuser', 'uses' => 'UserController@updateUser'])->middleware('isactive');

    Route::post('resetuser',
        ['as' => 'resetuser', 'uses' => 'UserController@resetUserStatus'])->middleware('isactive');

   	Route::get('createcase',
        ['as' => 'createcase', 'uses' => 'BeneficiaryCaseController@create'])->middleware('isactive');

    Route::get('viewcase/{id}',
        ['as' => 'viewcase/{id}', 'uses' => 'BeneficiaryCaseController@viewCase'])->middleware('isactive');

    Route::get('updatecase',
        ['as' => 'updatecase', 'uses' => 'BeneficiaryCaseController@getCase'])->middleware('isactive');

    Route::post('createcase',
        ['as' => 'createcase', 'uses' => 'BeneficiaryCaseController@createCase'])->middleware('isactive');

    Route::post('updatecase',
        ['as' => 'updatecase', 'uses' => 'BeneficiaryCaseController@updateCase'])->middleware('isactive');

   	Route::get('searchbeneficiary',
        ['as' => 'searchbeneficiary', 'uses' => 'BeneficiaryController@searchBeneficiary'])->middleware('isactive');

    Route::get('getbeneficiary',
        ['as' => 'getbeneficiary', 'uses' => 'BeneficiaryController@beneficiaryById'])->middleware('isactive');

    Route::get('getbeneficiarycase',
        ['as' => 'getbeneficiarycase', 'uses' => 'BeneficiaryCaseController@beneficiaryCaseById'])->middleware('isactive');

    Route::get('searchcaseofficer',
        ['as' => 'searchcaseofficer', 'uses' => 'UserController@searchCaseOfficer'])->middleware('isactive');

    Route::get('upload',
        ['as' => 'upload', 'uses' => 'UploadController@uploadForm'])->middleware('isactive');
    Route::post('upload',
        ['as' => 'upload', 'uses' => 'UploadController@uploadSubmit'])->middleware('isactive');
    Route::get('viewfileupload',
        ['as' => 'viewfileupload', 'uses' => 'UploadController@uploadedFiles'])->middleware('isactive');
    Route::post('viewfileupload',
        ['as' => 'viewfileupload', 'uses' => 'UploadController@getUploadedFiles'])->middleware('isactive');


});


// Authentication Routes...
$this->get('login', 'Auth\AuthController@showLoginForm');
$this->post('login', 'Auth\AuthController@login');
$this->get('logout', 'Auth\AuthController@logout');
/*
// Registration Routes...
$this->get('register', 'Auth\AuthController@showRegistrationForm');
$this->post('register', 'Auth\AuthController@register');

// Password Reset Routes...
$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('password/reset', 'Auth\PasswordController@reset');

*/
