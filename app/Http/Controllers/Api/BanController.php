<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\BanRequest;

class BanController extends Controller
{
    public function index()
    {
        return $users = User::onlyBanned()->get();
    }

    public function setBan(BanRequest $request, string $id)
    {
        $request->validated();
        $user = User::findOrFail($id);
        if(!$request['expired_at'])
        {
            $user->ban([
                'expired_at' => '2038-01-01 00:00:00',
                'comment' => $request['comment'],
            ]);
        }
        else
        {
            $user->ban([
                'expired_at' => $request['expired_at'],
                'comment' => $request['comment'],
            ]);
        }
        return $data = User::find($id);
    }

    public function unBan(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->unban();
        return $data = User::find($id);
    }
}
