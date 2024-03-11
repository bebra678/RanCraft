<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreDonateListRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'price' => ['required', 'integer'],
            'description' => ['required', 'string', 'max:255', 'min:3'],
            'photo' => ['nullable', 'file', 'mimes:jpg,png'],
        ];
    }

    public function messages()
    {
        return [
            'name' => [
                'required' => 'Отсутствует значения в поле название (name)',
                'string' => 'Текст поля название (name) должен быть строкой',
                'max' => 'Максимальное значение поля название (name) доната: 255',
                'min' => 'Минимальное значение поля название (name) доната: 3',
            ],
            'price' => [
                'required' => 'Отсутствует значения в поле цена (price)',
                'integer' => 'Поле цена (price) доната должнен быть integer',
            ],
            'description' => [
                'required' => 'Отсутствует значения в поле описание (description)',
                'string' => 'Текст поля описание (description) должен быть строкой',
                'max' => 'Максимальное значение описание (description) доната: 255',
                'min' => 'Минимальное значение описание (description) доната: 3',
            ],
            'photo' => [
                'file' => 'Отправляемое в поле фото (photo) должно быть файлом',
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
