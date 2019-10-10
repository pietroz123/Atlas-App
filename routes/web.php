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

Route::get('/', 'HomeController@index');
Route::get('/clientes/pacientes', 'HomeController@pacientes');
Route::get('/clientes/medicos', 'HomeController@medicos');


/**
 * APPOINTMENTS ROUTES
 */

Route::get('/agendamentos/buscar', 'AppointmentSearchController@search')->name('appointments.search');
Route::get('/agendamentos/resultado', 'AppointmentSearchController@results')->name('appointments.result');

Route::get('/medico', function() {
    return view('doctor-profile');
})->name('doctor-profile');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
