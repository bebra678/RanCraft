<?php

use App\Http\Resources\PostResource;
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

Route::get('/post', function () {
    $data = PostResource::collection(Post::all());
    if(!$data)
    {
        return response()->json('Список постов пуст');
    }
    return $data;
});

Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::group(['middleware' => 'forbid-banned-user'], function () {
        Route::post('/change/password', [UserController::class, 'changePassword']);
        Route::post('/change/img', [UserController::class, 'updateSkin']);
        Route::post('/create/comment', [CommentController::class, 'createComment']);
        Route::post('/create/application', [DonateController::class, 'createApplication']);
        Route::apiResources(['/comments' => CommentController::class,]);
        Route::apiResources(['/users' => UserController::class,]);
        Route::get('/bans', [BanController::class, 'index']);
        Route::post('/setban/{id}', [BanController::class, 'setBan']);
        Route::post('/unban/{id}', [BanController::class, 'unBan']);
        Route::apiResources(['/admin/donate/applications' => DonateController::class,]);
        Route::apiResources(['/admin/donate' => DonateListController::class,]);
        Route::apiResources(['/posts' => PostsController::class,]);
    });
});

Route::group(['middleware' => 'admin'], function (){

});

Route::group(['middleware' => 'check.user'], function (){

});

/*
 /auth/userinfo.email
 */
