<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(['/users' => UserController::class,]);

Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::apiResources(['/posts' => PostsController::class,]);
});
