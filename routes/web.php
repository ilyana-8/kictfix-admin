<?php

// use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\Auth\ForgotPasswordController;
// use App\Http\Controllers\Auth\ConfirmPasswordController;
// use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
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

Route::prefix('admin')->group(function() {
    // Login Routes...
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class,'login']);
    Route::post('/logout',  [LoginController::class,'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::prefix('/profile')->group(function() {
        Route::get('/{id}', [ProfileController::class, 'show'])->name('profile.show');
        Route::patch('/update-profile/{id}', [ProfileController::class, 'updateProfile'])->name('profile.updateProfile');
        Route::put('/update-password/{id}', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    });

    // Users
    Route::prefix('users')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');

        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::patch('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::put('/update-password/{id}', [UserController::class, 'updatePassword'])->name('user.update-password');

        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

        Route::get('/search-users', [UserController::class, 'searchUser'])->name('user.search');
    });

    // Technician
    Route::prefix('/technicians')->group(function() {
        Route::get('/', [TechnicianController::class, 'index'])->name('technician.index');
        Route::get('/show/{id}', [TechnicianController::class, 'show'])->name('technician.show');

        Route::get('/register', [TechnicianController::class, 'create'])->name('technician.register');
        Route::post('/store', [TechnicianController::class, 'store'])->name('technician.store');

        Route::get('/edit/{id}', [TechnicianController::class, 'edit'])->name('technician.edit');
        Route::patch('/update/{id}', [TechnicianController::class, 'update'])->name('technician.update');
        Route::put('/update-password/{id}', [TechnicianController::class, 'updatePassword'])->name('technician.update-password');

        Route::delete('/delete/{id}', [TechnicianController::class, 'destroy'])->name('technician.delete');

        Route::get('/search-technicians', [TechnicianController::class, 'searchTechnician'])->name('technician.search');
    });

    // Reports
    Route::prefix('/reports')->group(function() {
        Route::get('/', [ReportController::class, 'index'])->name('report.index');

        Route::get('/edit/{id}', [ReportController::class, 'edit'])->name('report.edit');
        Route::patch('/update/{id}', [ReportController::class, 'update'])->name('report.update');

        Route::delete('/delete/{id}', [ReportController::class, 'destroy'])->name('report.delete');

        Route::get('/search-reports', [ReportController::class, 'searchReport'])->name('report.search');
    });

    // ADDITIONAL AUTHENTICATION FEATURES FOR ADMIN
    // Registration Routes...
    // Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    // Route::post('register', [RegisterController::class, 'register']);

    // Password Reset Routes...
    // Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    // Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    // Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    // Route::post('password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');

    // Confirm Password
    // Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    // Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

    // Email Verification Routes...
    // Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    // Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    // Route::get('email/resend',  [VerificationController::class, 'resend'])->name('verification.resend');
});
