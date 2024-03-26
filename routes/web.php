<?php

use App\Http\Controllers\Social\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostsController;

Route::group(['middleware' => 'ban'], function () { //forbid-banned-user

});
Route::get('{any?}', fn() => view('index'))->where('any', '^(?!auth).*$')->name('home'); //.*

//Route::get('/ban/info', fn() => view('ban'))->name('ban');

Route::get('/auth/vk', [SocialController::class, 'vk']);
Route::get('/auth/vk/callback', [SocialController::class, 'vkCallback']);

Route::get('/auth/google', [SocialController::class, 'google']);
Route::get('/auth/google/callback', [SocialController::class, 'googleCallback']);

Auth::routes();

Auth::routes(['verify' => true]);

