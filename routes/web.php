<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/view', function () {
    return view('view');
})->name('view');

Route::get('/charts', function () {
    return view('charts');
})->name('charts');

Route::resource('/student', StudentController::class)->middleware('auth:web');
Route::resource('/subject', SubjectController::class)->middleware('auth:web');
Route::resource('/enrollment', EnrollmentController::class)->middleware('auth:web');
Route::resource('/grade', GradeController::class)->middleware('auth:web');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:web', 'verified'])->name('dashboard');

// Student routes with auth middleware
Route::middleware(['auth'])->group(function () {
    // Student dashboard
    Route::get('/student-dashboard', function () {
        if (auth()->user()->role !== 'student') {
            return redirect('/dashboard');
        }
        return view('student.dashboard');
    })->name('student-dashboard');
    
    // Student grades and subjects
    Route::get('/student-grades', [StudentController::class, 'showGrades'])->name('student.grades');
    Route::get('/student-subjects', [StudentController::class, 'showSubjects'])->name('student.subjects');

    // Profile routes
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
});

require __DIR__.'/auth.php';