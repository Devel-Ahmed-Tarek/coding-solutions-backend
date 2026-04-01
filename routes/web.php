<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\ContactInfoController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\TechnologyController;
use App\Http\Controllers\Dashboard\TestimonialController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::resource('services', ServiceController::class);
    Route::delete('projects/{project}/images/{image}', [ProjectController::class, 'destroyImage'])->name('projects.images.destroy');
    Route::resource('projects', ProjectController::class);
    Route::resource('technologies', TechnologyController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('articles', ArticleController::class);
    Route::get('contact', [ContactInfoController::class, 'edit'])->name('contact.edit');
    Route::put('contact', [ContactInfoController::class, 'update'])->name('contact.update');
});
