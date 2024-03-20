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
                'nick.required' => 'Вы не указали Nick',
                'nick.regex' => 'Nick может только содержать: латинские буквы, цифры и нижние подчеркивание',
                'nick.max' => 'Nick должен содержать не более 30 символов',
                'nick.unique' => 'Данный Nick уже занят',
                'nick.min' => 'Nick должен содержать не меньше 3 символов',
                'name.required' => 'Вы не указали Имя',
                'name.string' => 'Поле Имя должно быть строкой',
                'name.min' => 'Имя должно содержать не меньше 2 символов',
                'name.max' => 'Имя должно содержать не более 30 символов',
                'email.required' => 'Вы не указали Email',
                'email.string' => 'Поле Email должно быть строкой',
                'email.email' => 'Неверный формат электронной почты',
                'email.min' => 'Email должен содержать не меньше 10 символов',
                'email.max' => 'Email должен содержать не более 50 символов',
                'email.unique' => 'Данный Email уже занят',
                'password.string' => 'Поле Пароль должно быть строкой',
                'password.max' => 'Password должен содержать не более 100 символов',
                'password.min' => 'Password должен содержать не меньше 8 символов',
                'password.confirmed' => 'Пароли не совпадают',
                'password.required' => 'Вы не заполнили поле Пароль',
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
