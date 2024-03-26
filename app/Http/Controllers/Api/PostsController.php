<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use http\Message;
use App\Http\Resources\PostResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show');
    }
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $data = PostResource::collection(Post::all());
        if(!$data)
        {
            return response()->json('Список постов пуст');
        }
        return $data;
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $data['photo'] = Storage::disk('storage')->put('/post', $data['photo']);
        //$post = Post::Create($request->validated());
        Post::firstOrCreate($data);
        return $data;
    }

    public function show(string $id)
    {
        $post = Post::find($id);
        if(!$post)
        {
            return response()->json('Такого поста не существует');
        }
        $comments = Comment::where('post_id', $id)->get();
        $data = ['post' => $post, 'comments' => $comments];
        return response()->json($data);
    }

    public function update(StorePostRequest $request, string $id)
    {
        $data = Post::find($id);
        if(!$data)
        {
            return response()->json('Такого поста не существует');
        }
        $data->fill($request->except(['id']));
        $data['photo'] = Storage::disk('storage')->put('/post', $request['photo']);
        $data->save();
        return response()->json($data);
    }

    public function destroy(string $id)
    {
        $data = Post::find($id);
        if(!$data)
        {
            return response()->json('Такого поста не существует');
        }
        $data->delete();
        return response()->json('Пост '.$data['name'].'('.$data['id'].') был удален');
    }
}
