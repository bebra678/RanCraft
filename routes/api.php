<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Social\SocialController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(['/users' => UserController::class,]);

Route::get('vk/auth', [SocialController::class, 'index']);
Route::get('vk/auth/callback', [SocialController::class, 'callbackvk']);

Route::group(['middleware' => ['auth:sanctum','admin']], function (){
    Route::apiResources(['/posts' => PostsController::class,]);
});
