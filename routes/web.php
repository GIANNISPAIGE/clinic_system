<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PatientAuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientSessionController;
use App\Http\Controllers\ReferralController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "web" middleware group. Enjoy building your app!
|
*/

## -----------------------------------------
## ✅ Default Route (Login Page)
## -----------------------------------------
Route::get('/', function () {
    return view('user_roles.selection');
});

## -----------------------------------------
## ✅ Admin Routes (Login, Dashboard, Logout)
## -----------------------------------------
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
    
   

     Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/home', [AdminController::class, 'dashboard'])->name('admin.home');
        Route::get('/Homes', [ClientController::class, 'home'])->name('patients.home');
        Route::resource('patients', PatientController::class);
        Route::get('patients-list/new', [PatientController::class, 'newPatients'])
    ->name('patients.new');
    Route::get('/patients/download', [PatientController::class, 'downloadPdf'])->name('patients.download');
    Route::get('/patients/{patient}', [PatientController::class, 'show'])
    ->name('patients.show');
    Route::resource('referrals', ReferralController::class);
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    Route::put('/appointments/{id}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
Route::put('/appointments/{id}/complete', [AppointmentController::class, 'complete'])->name('appointments.complete');
Route::put('/appointments/{id}/reschedule', [AppointmentController::class, 'reschedule'])->name('appointments.reschedule');


Route::resource('patient_sessions', PatientSessionController::class);
Route::get('/patient-sessions/calendar', [PatientSessionController::class, 'calendar'])->name('patient_sessions.calendar');


});
 });
 
Route::fallback(function () {
    return redirect('/login');
});







//patients route informations 

//Route::prefix('patient')->group(function () {
    // Registration Routes
     

  Route::group(['prefix' => 'patient'], function () {
    Route::get('/register', fn() => view('patient_profiles.register'))->name('patient.register');
    Route::post('/register', [PatientAuthController::class, 'register'])->name('patient.register.post');
    Route::get('/login', fn() => view('patient_profiles.login'))->name('patient.login');
    Route::post('/login', [PatientAuthController::class, 'login'])->name('patient.login.post');
    
    Route::group(['middleware' => ['auth:patient_profile']], function () {
        Route::get('/home', [PatientAuthController::class, 'home'])->name('patient_profiles.home');
        Route::post('/logout', [PatientAuthController::class, 'logout'])->name('patient.logout');
         Route::get('/patient_profiles', [PatientAuthController::class, 'index'])->name('patient_profiles.index');
        Route::get('/patient_profiles/edit', [PatientAuthController::class, 'edit'])->name('patient_profiles.edit');
       Route::put('/patient_profiles/', [PatientAuthController::class, 'update'])->name('patient_profiles.update');
    });
});
