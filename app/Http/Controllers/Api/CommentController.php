<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('createComment');
    }
    public function index()
    {
        $data = Comment::all();
        if(!$data)
        {
            return response()->json('Список комментариев пуст');
        }
        return $data;
    }

    public function store(StoreCommentRequest $request)
    {
//        $data = $request->validated();
////        $user = $request->user();
////        $id = $user->id;
////        $data['user_id'] = $id;
//      $data['user_id'] = auth()->user()->id;
//      Comment::firstOrCreate($data);
//      return $data;
    }

    public function show(string $id)
    {
        $data = Comment::find($id);
        if(!$data)
        {
            return response()->json('Такого комментария не существувет');
        }
        return $data;
    }

    public function update(Request $request, string $id)
    {
        $data = Comment::find($id);
        if(!$data)
        {
            return response()->json('Такого комментария не существувет', 422);
        }
        $data->fill($request->except(['id']));
        $data->save();
        return $data;
    }

    public function destroy(string $id)
    {
        $data = Comment::find($id);
        if(!$data)
        {
            return response()->json('Такого комментария не существувет');
        }
        $data->delete();
        return response()->json('Комментарий '.$data['id'].' удален');
    }

    public function createComment(StoreCommentRequest $request)
    {
        $data = $request->validated();
        $user = User::findOrFail(Auth::id());
        $post = Post::Find($data['post_id']);
        if(!$post)
        {
            $msg = 'Такого поста не существует';
            return response()->json($msg, 422);
        }
        $comment = Comment::Create([
            'user_id' => $user['id'],
            'nick' => $user['nick'],
            'post_id' => $post['id'],
            'message' => $data['message'],
        ]);
        return response()->json($comment, 200);
    }
}
