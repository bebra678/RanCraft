<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function vk()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function vkCallback()
    {
        $request = Socialite::driver('vkontakte')->user();

        $user = User::where('email', $request->email)->first();

        if ($user)
        {
            Auth::login($user);
            return response()->json(['auth' => true, 'user' => $user]);
        }
        else
        {
            $data = [
                'email' => $request->getEmail(),
                'name' => $request->getName(),
                'social_name' => 'vk',
                'social_id' => $request->getId(),
            ];
            return response()->json(['auth' => false, 'data' => $data]);
        }
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $request = Socialite::driver('google')->user();

        $user = User::where('email', $request->email)->first();


        if ($user)
        {
            Auth::login($user);
            return response()->json(['auth' => true, 'user' => $user]);
        }
        else
        {
            $data = [
                'email' => $request->getEmail(),
                'name' => $request->getName(),
                'social_name' => 'google',
                'social_id' => $request->getId(),
            ];
            return response()->json(['auth' => false, 'data' => $data]);
        }
    }
}
