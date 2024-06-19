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
    Route::get('/instructors', [InstructorController::class, 'index'])->name('instructor-dashboard');
    Route::get('/instructors/sorted/all', [InstructorController::class, 'allResources'])->name('instructor-sorted-all');
    Route::get('/instructors/sorted/all/students', [InstructorController::class, 'allStudents'])->name('instructor-sorted-students');
    Route::get('/instructors/create/addProject', [InstructorController::class, 'createProject'])->name('instructor-create-project');
    Route::post('instructors/create/storeProject', [InstructorController::class, 'store'])->name('instructor-store-project');
    Route::get('/instructors/show/project/{id?}', [InstructorController::class, 'showProjectDetails'])->name('instructor-show-project');
    Route::get('/instructors/show/project/{id?}/addTask', [InstructorController::class, 'createTask'])->name('instructor-add-task');
    Route::post('/instructors/create/storeTask', [InstructorController::class, 'storeTask'])->name('instructor-store-task');
    Route::get('/instructors/student/{id?}/profile', [InstructorController::class, 'showStudentDetails'])->name('instructor-show-student');
    Route::post('instructors/project/delete/{id?}', [InstructorController::class, 'destroyProject'])->name('instructor-delete-project');
    Route::get('/instructors/project/edit/{id?}', [InstructorController::class, 'edit'])->name('instructor-edit-project');
    Route::patch('/instructors/project/edit/store/{id?}', [InstructorController::class, 'update'])->name('instructor-store-edit-project');
    Route::get('/instructors/project/task/edit/{id?}', [InstructorController::class, 'editTask'])->name('instructor-edit-task');
    Route::patch('/instructors/project/task/edit/store/{id?}', [InstructorController::class, 'updateTask'])->name('instructor-store-edit-task');

    // Students
    Route::get('/', [StudentController::class, 'index'])->name('student-dashboard');
});

Route::get('/github/users/{username}', [GithubController::class, 'getAuthenticatedUserInfo'])->name('github-user-info');
Route::get('/github/users/{username}/repos', [GithubController::class, 'getRepositories']);

require __DIR__.'/auth.php';
