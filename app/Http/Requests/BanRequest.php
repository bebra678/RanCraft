<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'expired_at' => ['nullable'],
            'comment' => ['required', 'string', 'max:30'],
        ];
    }

    public function messages()
    {
        return [
            'comment' => [
                'required' => 'Нужно указать причину бана',
                'max' => 'Максимально допустимое значение причины: 30',
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
