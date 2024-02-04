<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'title' => ['required', 'unique:posts', 'max:30', 'min:3'],
            'text' => ['required', 'max:255', 'min:3'],
            'photo' => ['required', 'file', 'mimes:jpg,png'],
        ];

        switch ($this->getMethod())
        {
            case 'POST':
                return $rules;
            case 'PUT':
                return [
                    'title' => ['required', 'max:30', 'min:3', Rule::unique('posts')->ignore($this->title, 'title')],
                    'text' => ['required', 'max:255', 'min:3'],
                    'photo' => ['required', 'file', 'mimes:jpg,png'],
                ];
        }
    }

    public function messages()
    {
        return [
            'title' => [
                'required' => 'Поле title не должно быть пустым',
                'max' => 'Максимально допустимое значение в поле title: 30',
                'min' => 'Минимальное допустимое значение в поле title: 3',
                'unique' => 'Поле title должно быть уникальным',
            ],
            'text' => [
                'required' => 'Поле text не должно быть пустым',
                'max' => 'Максимально допустимое значение в поле text: 255',
                'min' => 'Минимальное допустимое значение в поле text: 3',
            ],
            'photo' => [
                'required' => 'Изображение отсутсвует',
                'file' => 'Ошибка с файлом изображения',
                'mimes' => 'Формат файла изображения должен быть: .jpg .png',
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
