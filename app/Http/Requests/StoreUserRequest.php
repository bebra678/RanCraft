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
            'password' => ['required', 'string', 'max:100', 'min:8', 'confirmed'],
//            'g-recaptcha-response' => ['required', 'captcha'],
            'tg' => ['nullable', 'max:255'],
            'vk' => ['nullable', 'max:255'],
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
            ],
            'name' => [
                'required' => 'Поле Name не заполнено',
                'max' => 'Поле Name должно быть не больше 50',
                'min' => 'Поле Name должно быть не меньше 2',
            ],

        ];
    }
}
