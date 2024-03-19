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
        $user = Socialite::driver('vkontakte')->user();
        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser)
        {
            Auth::login($existingUser);
            return redirect('/');
        }
        else
        {
            return response()->json($user);
        }
//        $email = $user->getEmail();
//        $u = User::where('email', $email)->first();
//        $data = ['email' => $email];
//        if($u)
//        {
//            return $email;
//        }
//        return $data;
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser)
        {
            Auth::login($existingUser);
            return redirect('/')->with('user', $existingUser);
        }
        else
        {
//            $newUser = new User();
//            $newUser->name = $user->name;
//            $newUser->email = $user->email;
//            $newUser->password = bcrypt(str_random(16)); // Генерация случайного пароля
//            $newUser->save();
//            Auth::login($newUser);
//            return redirect()->intended('/dashboard');
            return redirect('/')->with('dataUser', $user);
            //return response()->json($user);
        }
    }
}
