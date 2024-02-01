<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function store(Request $request)
    {
        //
    }
    public function show(string $id)
    {
        return User::findOrFail($id);
    }
    public function update(StoreUserRequest $request, string $id)
    {
        $product = User::findOrFail($id);
        $product->fill($request->except(['id']));
        $product->save();
        return response()->json($product);
    }
    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
