<?php

use App\Http\Controllers\Social\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostsController;
use Laravel\Socialite\Facades\Socialite;

Route::group(['middleware' => 'ban'], function () { //forbid-banned-user

});
Route::get('{any?}', fn() => view('index'))->where('any', '^(?!auth).*$')->name('home'); //.*

Route::get('/ban/info', fn() => view('ban'))->name('ban');

//Route::get('/auth/vk', [SocialController::class, 'vk']);
//Route::get('/auth/vk/callback', [SocialController::class, 'vkCallback']);
//
Route::get('/auth/google', [SocialController::class, 'google']);
Route::get('/auth/google/callback', [SocialController::class, 'googleCallback']);

//Route::get('auth/google', function () {
//   return Socialite::driver('google')->redirect();
//});
//
//Route::get('auth/google/callback', function () {
//    $user = Socialite::driver('google')->user();
//    dd($user->getEmail());
//});

Route::get('auth/vk', function () {
    return Socialite::driver('vkontakte')->redirect();
});

Route::get('auth/vk/callback', function () {
    $user = Socialite::driver('vkontakte')->user();
    dd($user->getEmail());
});

//Route::get('{any?}', fn() => view('index'))->where('any', '.*'); //.*

Auth::routes();


//Auth::routes(['verify' => true]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::group(['middleware' => 'ban'], function (){
//
//});
