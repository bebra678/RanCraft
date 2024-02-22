<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateAvatarRequest;
use App\Http\Requests\ChangePasswordRequest;

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

    public function updateSkin(UpdateAvatarRequest $request, string $id)
    {
        $request->validated();
        $data = User::findOrFail($id);
        $data['photo'] = Storage::disk('storage')->put('/avatar', $request['photo']);
        $data->save();
        return response()->json($data, 200);
    }

    public function changePassword(ChangePasswordRequest $request, string $id)
    {
        $request->validated();
        $data = User::findOrFail($id);
        if(Hash::check($request['old_password'], $data['password']))
        {
            $data['password'] = Hash::make($request['password']);
            $data->save();
            return response()->json([
                'message' => 'Вы удачно сменили пароль!',
            ]);
        }
        else
        {
            return response()->json([
                'message' => 'Ошибка! Вы ввели неправильный старый пароль.',
            ]);
        }
    }
}
