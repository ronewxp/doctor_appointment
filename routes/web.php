<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PrescriptionController;
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
Route::get('/doctor_dashboard', [DoctorController::class, 'DoctordDashboard'])->name('doctor_dashboard');
Route::get('/doctor_list', [DoctorController::class, 'index'])->name('doctor_list');
Route::get('/doctorAppointment',[AppointmentController::class,'DoctorAppointment'])->name('doctorAppointment');

//Patient route list
Route::get('/patient_list', [PatientController::class, 'index'])->name('patient_list');
Route::get('/myAppointment',[AppointmentController::class,'myAppointment'])->name('myAppointment');

//appointment route list
Route::resource('appointment', AppointmentController::class);

//Prescription route list
Route::resource('prescription', PrescriptionController::class);
Route::get('prescription/showPrescription/{prescription}',[PrescriptionController::class,'showPrescription'])->name('showPrescription');

