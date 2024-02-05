<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class BanController extends Controller
{
    public function index()
    {
        return $users = User::onlyBanned()->get();
        //return $data = User::where('ban', 'IS NOT', null)->get();
    }
    public function store(Request $request)
    {
        //
    }
    public function show(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
//        $data = User::findOrFail($id);
//        $data->fill($request->except(['id']));
//        $data['ban_start'] = Carbon::now();;
//        $data['ban_end'] = $request['ban_end'];
//        $data->save();
//        return response()->json($data);
    }
    public function destroy(string $id)
    {
        //
    }

    public function ban(Request $request)
    {
        $input = $request->all();

        if(!empty($input['id']))
        {
            $user = User::findOrFail($input['id']);
            $user->ban()->create([
                'expired_at' => '2030-03-28 00:00:00',
                'comment' => $request->baninfo,
            ]);
        }
        $data = User::find($input['id']);
        return $data;
    }
}
