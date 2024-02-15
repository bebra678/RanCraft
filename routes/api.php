<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Social\SocialController;
use App\Http\Controllers\Api\DonateController;
use App\Http\Controllers\Api\DonateListController;
use App\Models\DonateList;
use App\Http\Controllers\Api\BanController;
use App\Models\Post;
use App\Http\Controllers\Api\CommentController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/donate', function () {
    return DonateList::all();
});

Route::apiResources(['/posts' => PostsController::class,]);

Route::apiResources(['/comments' => CommentController::class,]);

Route::get('/vk/auth', [SocialController::class, 'index']);
Route::get('/vk/auth/callback', [SocialController::class, 'callbackvk']);

Route::group(['middleware' => 'admin'], function (){

});
Route::apiResources(['/users' => UserController::class,]);
Route::get('/bans', [BanController::class, 'index']);
Route::post('/setban/{id}', [BanController::class, 'setBan']);
Route::post('/unban/{id}', [BanController::class, 'unBan']);
Route::apiResources(['/admin/donate/applications' => DonateController::class,]);
Route::apiResources(['/admin/donate' => DonateListController::class,]);

Route::group(['middleware' => 'forbid-banned-user'], function () {

});





