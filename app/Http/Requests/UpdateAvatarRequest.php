<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAvatarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'photo' => ['required', 'file', 'mimes:jpg,png'],
        ];
    }

    public function messages()
    {
        return [
            'photo' => [
                'required' => 'Отсутствует отправленное изображение',
                'file' => 'Отправленное должно быть файлом',
                'mimes' => 'Формат изображения должен быть: .jpg .png',
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
