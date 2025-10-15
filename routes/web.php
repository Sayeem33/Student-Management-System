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

// Redirect root to login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Routes accessible only after login and for admin
Route::middleware(['auth'])->group(function () {

    // Admin panel
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('layout'); // your main layout/dashboard page
    })->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Student Management CRUD
    Route::resource('student', Studentcontroller::class);
    Route::resource('teacher', Teachercontroller::class);
    Route::resource('courses', Coursecontroller::class);
    Route::resource('batches', Batchcontroller::class);
    Route::resource('enrollments', Enrollmentcontroller::class);
    Route::resource('payments', Paymentcontroller::class);
    Route::resource('reports', Reportcontroller::class);

    // Payment slip PDF
    Route::get('/payments/{id}/slip', [ReportController::class, 'printSlip'])->name('payments.print');
});

// Auth routes (Laravel Breeze)
require __DIR__.'/auth.php';
