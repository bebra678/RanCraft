<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nick' => ['required', 'regex:/^[a-zA-Z0-9_]+$/i', 'max:30', 'min:3', Rule::unique('users')->ignore($this->nick, 'nick')],
            'name' => ['required', 'string', 'min:2', 'max:30'],
            'email' => ['required', 'string', 'email', 'min:10','max:50', Rule::unique('users')->ignore($this->email, 'email')],
            'password' => ['required', 'string', 'max:100', 'min:8'],
//            'g-recaptcha-response' => ['required', 'captcha'],
            'tg' => ['nullable', 'max:255'],
            'vk' => ['nullable', 'max:255'],
            'photo' => ['nullable', 'file', 'mimes:jpg,png'],
        ];
    }
    public function messages()
    {
        return [
            'nick' => [
                'required' => 'Поле Nick не заполнено',
                'max' => 'Nick может быть не больше 30 символов',
                'min' => 'Nick может быть не меньше 3 символов',
                'regex' => 'Nick может содержать: латинские буквы, цифры, нижние подчеркивание',
                'unique' => 'Данный Nick уже занят',
            ],
            'name' => [
                'required' => 'Поле Name не заполнено',
                'max' => 'Name должен быть не больше 50 символов',
                'min' => 'Name должен быть не меньше 2 символов',
            ],
            'email' => [
                'required' => 'Поле Email не заполнено',
                'max' => 'Email должен быть не больше 50 символов',
                'min' => 'Email должен быть не меньше 10 символов',
                'email' => 'Неверный формат электронной почты',
                'unique' => 'Данный Email уже занят',
            ],
            'password' => [
                'required' => 'Поле Password не заполнено',
                'max' => 'Password должен быть не больше 100 символов',
                'min' => 'Password должен быть не меньше 8 символов',
            ],
            'photo' => [
                'file' => 'Ошибка с файлом изображения',
                'mimes' => 'Формат файла изображения должен быть: .jpg .png',
            ],
        ];
    }
}
