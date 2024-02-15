<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCommentRequest extends FormRequest
{
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
            'post_id' => ['required', 'integer'],
            'message' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'post_id' => [
                'required' => 'Отсутствует передаваемое id поста',
                'integer' => 'Передаваемое id поста должно быть integer',
            ],
            'message' => [
                'required' => 'Отсутствует текст в комментарие',
                'string' => 'Текст в комментарие должен быть строкой',
                'max' => 'Максимальное допустимое количество символов не более 255',
            ],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Ошибка создание комментария',
            'errors' => $validator->errors()
        ]));
    }
}
