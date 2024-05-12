<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Models\Admin;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

// Student
Route::get('/Student', [StudentController::class, 'index'])->name('student.index');
Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
Route::put('/profile/{profile}', [StudentController::class, 'update'])->name('profile.update');
Route::post('/profile/store', [StudentController::class, 'store'])->name('profile.store');
Route::get('/property', [StudentController::class, 'property'])->name('property');
Route::get('/showPropertyStud/{id}', [StudentController::class, 'showPropertyStud'])->name('showPropertyStud');
Route::get('/complaint', [StudentController::class, 'complaint'])->name('complaint');
Route::post('/complaint/store', [StudentController::class, 'storeComplaint'])->name('complaint.store');
Route::get('/complaint/{complaint}/delete', [StudentController::class, 'destroy']);
Route::get('/accommodation', [StudentController::class, 'accommodation'])->name('accommodation');




// Admin
Route::get('/Admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/property-Admin', [AdminController::class, 'viewProperty'])->name('viewProperty');
Route::get('/showProperty/{id}', [AdminController::class, 'showProperty'])->name('showProperty');
Route::post('/property-Admin/store', [AdminController::class, 'store'])->name('properties.store');
Route::get('/manageUser-Admin', [AdminController::class, 'viewUser'])->name('viewUser');
Route::get('/showUser/{id}', [AdminController::class, 'showUser'])->name('showUser');
Route::get('/complaint-Admin', [AdminController::class, 'complaint'])->name('complaint');
Route::get('/report-Admin', [AdminController::class, 'report'])->name('report');




