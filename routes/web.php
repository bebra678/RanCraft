<?php

use App\Http\Controllers\Social\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostsController;

Route::group(['middleware' => 'ban'], function () { //forbid-banned-user

});
Route::get('{any?}', fn() => view('index'))->where('any', '^(?!api).*$'); //.*

Route::get('/ban/info', fn() => view('ban'))->name('ban');

Route::get('/api/vk/auth', [SocialController::class, 'index']);
Route::get('/api/vk/auth/callback', [SocialController::class, 'callbackvk']);


//Route::get('{any?}', fn() => view('index'))->where('any', '.*'); //.*

Auth::routes();


//Auth::routes(['verify' => true]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::group(['middleware' => 'ban'], function (){
//
//});
