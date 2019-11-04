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
Route::get('/marcar-agendamento/{doctor_id}/{ap_date}/{ap_time}', 'AppointmentController@bookAppointmentPage')->name('appointments.bookpage');
Route::post('/marcar-agendamento', 'AppointmentController@bookAppointment')->name('appointments.book');

/**
 * DOCTOR ROUTES
 */
Route::get('/doctors', 'DoctorController@index')->name('doctors.index');
Route::post('/doctors', 'DoctorController@store')->name('doctors.store');
Route::get('/doctors/create', 'DoctorController@create')->name('doctors.create');
Route::put('/doctors/{doctor}', 'DoctorController@update')->name('doctors.update');
Route::delete('/doctors/{doctor}', 'DoctorController@destroy')->name('doctors.destroy');
Route::get('/doctors/{doctor}', 'DoctorController@show')->name('doctors.show');
Route::get('/doctors/{doctor}/edit', 'DoctorController@edit')->name('doctors.edit');

/**
 * AUTHENTICATION ROUTES
 */
Auth::routes();

// Facebook
Route::get('/redirect/facebook', 'Social\SocialAuthFacebookController@redirect');
Route::get('/callback/facebook', 'Social\SocialAuthFacebookController@callback');
// Google
Route::get('/redirect/google', 'Social\SocialAuthGoogleController@redirect');
Route::get('/callback/google', 'Social\SocialAuthGoogleController@callback');


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/login/medico', 'Auth\LoginController@showDoctorLoginForm')->name('login.doctor');
Route::get('/login/paciente', 'Auth\LoginController@showPatientLoginForm')->name('login.patient');
Route::get('/cadastro/medico', 'Auth\RegisterController@showDoctorRegisterForm');
Route::get('/cadastro/paciente', 'Auth\RegisterController@showPatientRegisterForm');

Route::post('/login/doctor', 'Auth\LoginController@doctorLogin');
Route::post('/login/patient', 'Auth\LoginController@patientLogin');
Route::post('/register/doctor', 'Auth\RegisterController@createDoctor')->name('register.doctor');
Route::post('/register/patient', 'Auth\RegisterController@createPatient')->name('register.patient');

Route::view('/dashboard/medico', 'doctors.dashboard');
Route::view('/dashboard/paciente', 'patients.dashboard');
