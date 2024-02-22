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

Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::group(['middleware' => 'check.user'], function (){
        Route::post('/change/password/{id}', [UserController::class, 'changePassword']);
        Route::post('/change/img/{id}', [UserController::class, 'updateSkin']);
        Route::post('/create/comment/{id}', [CommentController::class, 'createComment']);
        Route::post('/create/application/{id}', [DonateController::class, 'createApplication']);
    });
});

Route::apiResources(['/comments' => CommentController::class,]);

Route::group(['middleware' => 'admin'], function (){
    Route::get('/bans', [BanController::class, 'index']);
});
Route::apiResources(['/users' => UserController::class,]);

Route::post('/setban/{id}', [BanController::class, 'setBan']);
Route::post('/unban/{id}', [BanController::class, 'unBan']);
Route::apiResources(['/admin/donate/applications' => DonateController::class,]);
Route::apiResources(['/admin/donate' => DonateListController::class,]);

Route::group(['middleware' => 'forbid-banned-user'], function () {

});

//Route::get('/id', function (Request $request) {
//    $userId = Auth::id();
//    return response()->json(['user_id' => $userId]);
//});





