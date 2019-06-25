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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

# Company Routes
Route::get('/companies','CompanyController@index')->name('companies');
Route::get('/company/create','CompanyController@create')->name('createCompany');
Route::post('/company/store','CompanyController@store')->name('storeCompany');
Route::get('/company/show/{id}','CompanyController@show')->name('showCompany');
Route::get('/company/edit/{id}','CompanyController@edit')->name('editCompany');
Route::post('/company/update','CompanyController@update')->name('updateCompany');
Route::post('/company/destroy','CompanyController@destroy')->name('destroyCompany');


# Employee Routes
Route::get('/employee/create/{companyID}','EmployeeController@create')->name('createEmployee');
Route::get('/employee/show/{id}','EmployeeController@show')->name('showEmployee');
Route::get('/employee/edit/{id}','EmployeeController@edit')->name('editEmployee');
Route::post('/employee/store','EmployeeController@store')->name('storeEmployee');
Route::post('/employee/update','EmployeeController@update')->name('updateEmployee');
Route::post('/employee/destroy','EmployeeController@destroy')->name('destroyEmployee');
