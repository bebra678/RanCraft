<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('store');
    }
    public function index()
    {
        return $data = Comment::all();
    }

    public function store(StoreCommentRequest $request)
    {
        $data = $request->validated();
//        $user = $request->user();
//        $id = $user->id;
//        $data['user_id'] = $id;
      $data['user_id'] = auth()->user()->id;
      Comment::firstOrCreate($data);
      return $data;
    }

    public function show(string $id)
    {
        return Comment::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $data = Comment::findOrFail($id);
        $data->fill($request->except(['id']));
        $data->save();
        return response()->json($data);
    }

    public function destroy(string $id)
    {
        $data = Comment::findOrFail($id);
        $data->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function createComment(StoreCommentRequest $request, string $id)
    {
        $data = $request->validated();
        Comment::firstOrCreate($data);
        return response()->json($data, 200);
    }
}
