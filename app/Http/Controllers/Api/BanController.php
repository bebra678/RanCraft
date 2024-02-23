<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\BanRequest;
use Illuminate\Support\Facades\Auth;

class BanController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index');
    }
    public function index()
    {
        $users = User::onlyBanned()->get();
        if(!$users)
        {
            return response()->json('Список банов пуст', 200);
        }
        return $users;
    }

    public function setBan(BanRequest $request, string $id)
    {
        $request->validated();
        $user = User::find($id);
        if(!$user)
        {
            return response()->json('Такого пользователя не существует', 422);
        }
        if(!$request['expired_at'])
        {
            $user->ban([
                'expired_at' => '2038-01-01 00:00:00',
                'comment' => $request['comment'],
            ]);
            return response()->json('Пользователь '.$user['nick'].'('.$user['id'].') был забанен '.'по причине '.$request['comment']);
        }
        else
        {
            $user->ban([
                'expired_at' => $request['expired_at'],
                'comment' => $request['comment'],
            ]);
            return response()->json('Пользователь '.$user['nick'].'('.$user['id'].') был забанен до '.$request['expired_at'].' по причине '.$request['comment']);
        }
    }

    public function unBan(Request $request, string $id)
    {
        $user = User::find($id);
        if(!$user)
        {
            return response()->json('Такого пользователя не существует', 422);
        }
        $user->unban();
        return response()->json('Пользователь '.$user['nick'].'('.$user['id'].') был разбанен');
    }
}
