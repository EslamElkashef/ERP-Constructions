<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;

Auth::routes();
Route::get('/', [HomeController::class, 'root'])->name('home');
Route::get('/index', [HomeController::class, 'root'])->name('index');

##################################### Start Employees Section #############################################
Route::resource('employees', EmployeeController::class);
##################################### End Employees Section #############################################
##################################### Start Clients Section #############################################
Route::resource('clients', ClientController::class);
##################################### End Clients Section #############################################