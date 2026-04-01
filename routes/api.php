<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\ContactInfoController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\Api\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/services', [ServiceController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/technologies', [TechnologyController::class, 'index']);
Route::get('/testimonials', [TestimonialController::class, 'index']);
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{article:slug}', [ArticleController::class, 'show']);
Route::get('/contact', [ContactInfoController::class, 'show']);
