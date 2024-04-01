<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nick' => ['required', 'regex:/^[a-zA-Z0-9_]+$/i', 'max:30', 'unique:users', 'min:3'], //regex:/^[a-z]+$/i  alpha_dash
            'name' => ['required', 'string', 'min:2', 'max:30'],
            'email' => ['required', 'string', 'email', 'min:10','max:50', 'unique:users'],
            'password' => ['required', 'string', 'max:100', 'min:8', 'confirmed'],
//            'g-recaptcha-response' => ['required', 'captcha'],
            'tg' => ['nullable', 'max:255'],
            'vk' => ['nullable', 'max:255'],
        ], [
            'nick.required' => 'Вы не указали логин',
            'nick.regex' => 'Никнейм может содержать: латинские буквы, цифры, нижние подчеркивание',
            'nick.max' => 'Никнейм слишком длинный. Максимальная длина 30 символов',
            'nick.unique' => 'Введенный никнейм уже занят, ведите другой',
            'nick.min' => 'Никнейм слишком короткий. Минимальная длина 3 символа',
            'name.required' => 'Вы не указали имя',
            'name.max' => 'Имя слишком длинное. Максимальная длина 30 символов',
            'name.min' => 'Имя слишком короткое. Минимальная длина 2 символа',
            'email.required' => 'Вы не указали почту',
            'email.email' => 'Неверный формат электронной почты',
            'email.min' => 'Почта слишком короткая. Минимальная длина 10 символов',
            'email.max' => 'Почта слишком длинная. Максимальная длина 50 символов',
            'email.unique' => 'Такая почта уже занята',
            'password.required' => 'Вы не указали пароль',
            'password.max' => 'Пароль слишком длинный. Максимальная длина 100 символов',
            'password.min' => 'Пароль слишком короткий. Минимальная длина 8 символов',
            'password.confirmed' => 'Пароль и повторение пароля не совпадают',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nick' => $data['nick'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'photo' => 'images/default.png',
        ]);
    }
}
