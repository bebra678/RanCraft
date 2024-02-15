<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use http\Message;
use App\Http\Resources\PostResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;

class PostsController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('admin')->except('index', 'show');
//    }
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        return PostResource::collection(Post::all());
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $data['photo'] = Storage::put('/images', $data['photo']);
        //$post = Post::Create($request->validated());
        Post::firstOrCreate($data);
        return $data;
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', $id)->get();
        //return $data = [$post, $comments];
        return response()->json([
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function update(StorePostRequest $request, string $id)
    {
        $data = Post::findOrFail($id);
        $data->fill($request->except(['id']));
        $data['photo'] = Storage::put('/images', $request['photo']);
        $data->save();
        return response()->json($data);
    }

    public function destroy(string $id)
    {
        $data = Post::findOrFail($id);
        $data->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
