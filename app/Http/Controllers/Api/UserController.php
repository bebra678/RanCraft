<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateAvatarRequest;

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
            $data['photo'] = Storage::disk('storage')->put('/avatar', $request['photo']);
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

    public function updateSkin(Request $request)
    {
        //
    }
}
