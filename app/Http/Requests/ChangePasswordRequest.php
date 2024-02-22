<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
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
//            'id' => ['required', 'integer'],
            'old_password' => ['required', 'string'],
            'password' => ['required', 'string', 'max:100', 'min:8', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'password' => [
                'required' => 'Введите новый пароль',
                'string' => 'Пароль должен быть строкой',
                'max' => 'Максимально допустимое количество символов: 100',
                'min' => 'Минимальное допустимое количество символов: 8',
                'confirmed' => 'Вы не повторили новый пароль',
            ],
            'old_password' => [
                'required' => 'Введите старый пароль',
                'string' => 'Старый пароль должен быть строкой',
            ],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Ошибка валидации',
            'errors' => $validator->errors()
        ]));
    }
}
