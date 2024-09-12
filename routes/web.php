<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Settings\AccountController;
use App\Http\Controllers\Settings\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


Route::get('/',          function(){return view('home');})     ->name('home');
Route::get('/dashboard', [DashboardController::class,'index']) ->name('dashboard');

Auth::routes(['verify' => true]);

Route::get('/settings/account', [AccountController::class,'index']);
Route::get('/settings/profile', [ProfileController::class,'edit'])   ->name('settings.profile.edit');
Route::put('/settings/profile', [ProfileController::class,'update']) ->name('settings.profile.update');

Route::resources([
   '/companies' => CompanyController::class,
   '/contacts'  => ContactController::class
]);