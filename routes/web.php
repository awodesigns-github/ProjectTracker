<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login-spcs');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admins
    Route::get('/admin', [AdminController::class, 'index'])->name('admin-dashboard');
    Route::get('/admin/show/instructors/cohort/{id?}', [AdminController::class, 'showInstructors'])->name('admin-show-instructors');
    Route::get('/admin/show/instructors/instructor/{id?}', [AdminController::class, 'showInstructorDetails'])->name('admin-show-instructor-details');
    Route::get('/admin/instructor/create', [AdminController::class, 'createInstructor'])->name('admin-create-instructor');

    // Instructors
    Route::get('/instuctors', [InstructorController::class, 'index'])->name('instructor-dashboard');
    Route::get('/instructors/sorted/all', [InstructorController::class, 'allResources'])->name('instructor-sorted-all');
    Route::get('/instructors/sorted/all/students', [InstructorController::class, 'allStudents'])->name('instructor-sorted-students');
    Route::get('/instructors/create/addProject', [InstructorController::class, 'createProject'])->name('instructor-create-project');
    Route::post('instructors/create/storeProject', [InstructorController::class, 'store'])->name('instructor-store-project');
    Route::get('/instructors/show/project/{id?}', [InstructorController::class, 'showProjectDetails'])->name('instructor-show-project');

    // Students
    Route::get('/', [StudentController::class, 'index'])->name('spcs-dashboard');
});

Route::get('/github/users/{username}', [GithubController::class, 'getAuthenticatedUserInfo'])->name('github-user-info');
Route::get('/github/users/{username}/repos', [GithubController::class, 'getRepositories']);

require __DIR__.'/auth.php';
