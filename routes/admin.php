<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get("dashboard",[\App\Http\Controllers\Admin\DashboardController::class,"index"])->name("dashboard");
Route::post("logout",[\App\Http\Controllers\Admin\Auth\AdminLoginController::class,"adminLogout"])->name("logout");

//
Route::resource('eo_profiles',\App\Http\Controllers\Admin\EventOrganizersProfilesController::class);
Route::resource('user_profiles',\App\Http\Controllers\Admin\UsersProfilesController::class);
Route::get('event/pending_events',[\App\Http\Controllers\Admin\EventsController::class,'show_unapproved'])->name('events.show_unapproved');
Route::post('event/approve',[\App\Http\Controllers\Admin\EventsController::class,'approveEvent'])->name('events.approve');
Route::resource('events',\App\Http\Controllers\Admin\EventsController::class);
