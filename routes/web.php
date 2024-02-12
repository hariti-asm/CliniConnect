<?php

use App\Models\Medication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;

use App\Http\Controllers\patientController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [SpecialityController::class,'getSpecialities']);
Route::get('/doctor_detail/{id}',[patientController::class,'doctor_detail'])->name('doctor_detail');
Route::post('/appointments/{session}/book', [patientController::class, 'book'])->name('appointments.book');
Route::post('/reviews/{id}/store', [patientController::class, 'store'])->name('reviews.store');
Route::get('/feedback/{id}', [FeedbackController::class, 'show'])->name('feedback.show');
Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients.show');
Route::get('/certificates/{id}', [CertificateController::class, 'show'])->name('certificates.show');
Route::get('/medications', [MedicationController::class, 'index'])->name('medications.index');
Route::put('/medications/{medication}', [MedicationController::class, 'update'])->name('medications.update');
Route::delete('/medications/{medication}',[MedicationController::class, 'destroy'])->name('medications.destroy');
Route::post('/medications', [MedicationController::class, 'store'])->name('medications.store');
Route::post('/certificates', [CertificateController::class, 'store'])->name('certificates.store');
Route::get('/sessions/{id}', [SessionController::class, 'show'])->name('sessions.show');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/patients', [AdminController::class, 'getPatients'])->name('admin.patients');
Route::get('/admin/medications', [AdminController::class, 'getMedications'])->name('admin.medications');



Route::get('/medications', [AdminController::class, 'index'])->name('medications.index');
Route::put('/medications/{medicine}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/medications/{medicine}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::post('/medications', [AdminController::class, 'store'])->name('admin.store');


Route::get('/specialties/create', [SpecialityController::class, 'create'])->name('specialities.create');

Route::post('/specialties', [SpecialityController::class, 'store'])->name('specialities.store');

Route::get('/specialties/{specialty}/edit', [SpecialityController::class, 'edit'])->name('specialities.edit');

Route::put('/specialties/{specialty}', [SpecialityController::class, 'update'])->name('specialities.update');

Route::delete('/specialties/{specialty}', [SpecialityController::class, 'destroy'])->name('specialities.destroy');

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
