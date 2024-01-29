<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function index()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callbackvk()
    {
        $user = Socialite::driver('vkontakte')->user();
        $email = $user->getEmail();
        $name = $user->getName();
        $u = User::where('email', $email)->first();
        $data = ['email' => $email, 'name' => $name];
        if($u)
        {
            return $email;
        }
        //User::create($data);
        return $data;
    }
}
