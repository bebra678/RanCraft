<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use http\Message;
use App\Http\Resources\PostResource;
use Illuminate\Http\Response;

class PostsController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::all());
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::Create($request->validated());
        return new PostResource($post);
    }

    public function show(string $id)
    {
        return new PostResource(Post::findOrFail($id));
    }

    public function update(StorePostRequest $request, string $id)
    {
        $data = Post::findOrFail($id);
        $data->fill($request->except(['id']));
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
