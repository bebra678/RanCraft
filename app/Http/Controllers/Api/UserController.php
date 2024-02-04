<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Storage;

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
        $data = User::findOrFail($id);
        $data->fill($request->except(['id']));
        if($request['photo'])
        {
            $data['photo'] = Storage::put('/images', $request['photo']);
        }
        $data->save();
        return response()->json($data);
    }
    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
