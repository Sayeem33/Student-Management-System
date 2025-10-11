<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Studentcontroller;
use App\Http\Controllers\Teachercontroller;
use App\Http\Controllers\Coursecontroller;
use App\Http\Controllers\Batchcontroller;
use App\Http\Controllers\Enrollmentcontroller;
use App\Http\Controllers\Paymentcontroller;
use App\Http\Controllers\Reportcontroller;

Route::get('/', function () {
    return view('layout');
});

route::resource('student', Studentcontroller::class);
route::resource('teacher', Teachercontroller::class);
route::resource('courses', Coursecontroller::class);
route::resource('batches', Batchcontroller::class);
route::resource('enrollments', Enrollmentcontroller::class);
route::resource('payments', paymentcontroller::class);
route::resource('reports', Reportcontroller::class);
Route::get('/payments/{id}/slip', [ReportController::class, 'printSlip'])->name('payments.print');