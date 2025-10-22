<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Studentcontroller;
use App\Http\Controllers\Teachercontroller;
use App\Http\Controllers\Coursecontroller;
use App\Http\Controllers\Batchcontroller;
use App\Http\Controllers\Enrollmentcontroller;
use App\Http\Controllers\Paymentcontroller;
use App\Http\Controllers\Reportcontroller;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| All routes inside the auth middleware will require login.
|
*/

// Welcome page (available for both logged in and guest users)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Routes accessible only after login and for admin
Route::middleware(['auth'])->group(function () {

    // Admin panel
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/make-admin/{id}', [AdminController::class, 'makeAdmin'])->name('admin.make-admin');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Student Management CRUD
    Route::resource('student', Studentcontroller::class);
    Route::resource('teacher', Teachercontroller::class);
    Route::resource('courses', Coursecontroller::class);
    Route::resource('batches', Batchcontroller::class);
    Route::resource('enrollments', Enrollmentcontroller::class);
    Route::resource('payments', Paymentcontroller::class);
    Route::resource('reports', Reportcontroller::class);

    // Get enrollment fee for payment
    Route::get('/api/enrollment/{id}/fee', [Enrollmentcontroller::class, 'getFee'])->name('enrollment.fee');

    // Payment slip PDF
    Route::get('/payments/{id}/slip', [ReportController::class, 'printSlip'])->name('payments.print');
});

// Auth routes (Laravel Breeze)
require __DIR__.'/auth.php';
