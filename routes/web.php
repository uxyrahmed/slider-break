<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MappoolController;
use App\Http\Controllers\ScheduleController;
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

// HOME ROUTE
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// SCHEDULE ROUTE
Route::get('/schedule', [ScheduleController::class, 'index'])
    ->name('schedule');

// MAPPOOL ROUTE
Route::get('/mappool', [MappoolController::class, 'index'])
    ->name('mappool');

// ABOUT ROUTE
Route::get('/about', [AboutController::class, 'index'])
    ->name('about');



