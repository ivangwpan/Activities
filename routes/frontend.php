<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\PresenterController;
use App\Http\Controllers\Frontend\StudentController;

Route::get('/', [IndexController::class, 'index'])->name('index');

// Route::get('/globalActivityDetails/{id}', [IndexController::class, 'globalActivityDetails'])->name('globalActivityDetails');
Route::get('/activityClassification', [IndexController::class, 'activityClassification'])->name('activityClassification');

Route::middleware('auth', 'role.weight:2')->prefix('/presenter')->group(function () {
    Route::get('/personalPage', [PresenterController::class, 'index'])->name('presenterPersonalPage');
    Route::get('/createActivity', [PresenterController::class, 'createActivity'])->name('createActivity');
    Route::post('/activityStore', [PresenterController::class, 'activityStore'])->name('activityStore');
    Route::get('/activityEdit/{id}', [PresenterController::class, 'activityEdit'])->name('activityEdit');
    Route::get('/activityScanner', [PresenterController::class, 'activityScanner'])->name('activityScanner');
});

Route::middleware('auth', 'role.weight:3')->prefix('/student')->group(function () {
    Route::get('/studentActivityDetails/{id}', [StudentController::class, 'index'])->name('studentActivityDetails');
    Route::get('/personalPage', [StudentController::class, 'personalPage'])->name('studentPersonalPage');
    Route::post('/registerStore', [StudentController::class, 'create'])->name('registerStore');
});
