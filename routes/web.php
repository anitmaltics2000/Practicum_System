 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentPortalController;
use App\Http\Controllers\CompanyPortalController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/notifications', [NotificationsController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/signin', [AuthController::class, 'showSignin']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::get('/register/student', [AuthController::class, 'showStudentRegister']);
Route::get('/register/company', [AuthController::class, 'showCompanyRegister']);
Route::get('/register/admin', [AuthController::class, 'showAdminRegister']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/signin', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

// Student Portal Routes
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student-portal', [StudentPortalController::class, 'dashboard'])->name('student.portal');
    Route::get('/apply', [StudentPortalController::class, 'showApplyForm'])->name('student.apply');
    Route::post('/apply', [StudentPortalController::class, 'submitApplication'])->name('student.submit.application');
});

// Company Portal Routes
Route::middleware(['auth', 'role:company'])->group(function () {
    Route::get('/company-portal', [CompanyPortalController::class, 'dashboard'])->name('company.portal');
    Route::post('/applications/{id}/status', [CompanyPortalController::class, 'updateApplicationStatus'])->name('company.update.status');
    Route::get('/company-report', [CompanyPortalController::class, 'generateReport'])->name('company.report');
});

// Admin Portal Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-portal', [AdminPortalController::class, 'dashboard'])->name('admin.portal');
    Route::get('/admin/users', [AdminPortalController::class, 'manageUsers'])->name('admin.users');
    Route::get('/admin/applications', [AdminPortalController::class, 'manageApplications'])->name('admin.applications');
    Route::get('/admin/reports', [AdminPortalController::class, 'generateReports'])->name('admin.reports');
    Route::get('/admin/settings', [AdminPortalController::class, 'systemSettings'])->name('admin.settings');
});
