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
        $data = User::all();
        if(!$data)
        {
            return response()->json('Список пользователей пуст');
        }
        return $data;
    }
    public function store(Request $request)
    {
        //
    }
    public function show(string $id)
    {
        $data = User::find($id);
        if(!$data)
        {
            return response()->json('Такого пользователя не существует');
        }
        return $data;
    }

    public function update(StoreUserRequest $request, string $id)
    {
        $data = User::find($id);
        if(!$data)
        {
            return response()->json('Такого пользователя не существует');
        }
        $data->fill($request->except(['id']));
        if($request['photo'])
        {
            $data['photo'] = Storage::disk('storage')->put('/avatar', $request['photo']);
        }
        $data->save();
        return $data;
    }
    public function destroy(string $id)
    {
        $data = User::find($id);
        if(!$data)
        {
            return response()->json('Такого пользователя не существует');
        }
        $data->delete();
        return response('Пользователь '.$data['nick'].'('.$data['id'].') был удален');
    }

    public function updateSkin(UpdateAvatarRequest $request)
    {
        $request->validated();
        $data = User::findOrFail(Auth::id());
        $data['photo'] = Storage::disk('storage')->put('/avatar', $request['photo']);
        $data->save();
        return response()->json($data, 200);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $request->validated();
        $data = User::findOrFail(Auth::id());
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
