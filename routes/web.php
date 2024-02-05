<?php

use App\Http\Controllers\Social\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostsController;

Route::group(['middleware' => 'forbid-banned-user'], function () {

});

Route::get('{any?}', fn() => view('index'))->where('any', '.*');

Auth::routes();

//Auth::routes(['verify' => true]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::group(['middleware' => 'ban'], function (){
//
//});
