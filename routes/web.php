<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//Doctor route list
Route::get('/doctor_list', [DoctorController::class, 'index'])->name('doctor_list');
Route::get('/doctor_dashboard', [DoctorController::class, 'DoctordDashboard'])->name('doctor_dashboard');


//Patient route list
Route::get('/patient_list', [PatientController::class, 'index'])->name('patient_list');

//appointment route list
Route::resource('appointment', AppointmentController::class);
Route::get('/myAppointment',[AppointmentController::class,'myAppointment'])->name('myAppointment');
Route::get('/doctorAppointment',[AppointmentController::class,'DoctorAppointment'])->name('doctorAppointment');
