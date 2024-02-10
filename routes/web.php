<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\patientController;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SessionController;

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\SpecialitiesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SpecialitiesController::class,'getSpecialities']);
Route::get('/doctor_detail/{id}',[patientController::class,'doctor_detail'])->name('doctor_detail');
Route::post('/appointments/{session}/book', [patientController::class, 'book'])->name('appointments.book');
Route::post('/reviews/{id}/store', [patientController::class, 'store'])->name('reviews.store');
Route::get('/feedback/{id}', [FeedbackController::class, 'show'])->name('feedback.show');
Route::get('/certificates/{id}', [CertificateController::class, 'show'])->name('certificates.show');
Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients.show');
Route::get('/sessions/{id}', [SessionController::class, 'show'])->name('sessions.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->get('/doctors/{id}', [DoctorController::class, 'show'])->name('doctors.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
