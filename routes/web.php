<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecialitiesController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;

use Illuminate\Support\Facades\Route;

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
Route::get('/doctor_detail/{id}',[DoctorController::class,'doctor_detail'])->name('doctor_detail');
Route::post('/appointments/{session}/book', [AppointmentController::class, 'book'])->name('appointments.book');
Route::post('/reviews/{id}/store', [DoctorController::class, 'store'])->name('reviews.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/doctors', function () {
    return view('doctors');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
