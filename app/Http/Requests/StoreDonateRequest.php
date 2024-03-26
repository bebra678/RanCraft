<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreDonateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
//            'user_id' => ['required', 'integer', 'max:11', 'min:1'],
//            'nick' => ['required', 'string', 'regex:/^[a-zA-Z0-9_]+$/i', 'max:30', 'min:3'],
            'donate' => ['required', 'integer', 'max:11'],
            'type_payment' => ['required', 'string', 'max:255', 'min:3'],
            'contact' => ['required', 'string', 'max:30', 'min:3'],
        ];
    }
    public function messages()
    {
        return [
            'donate' => [
                'required' => 'Ошибка клиента! Отсутствует id доната',
                'integer' => 'Ошибка в клиента! Id доната должнен быть integer',
                'max' => 'Ошибка в клиента! Максимальное значение id доната: 255',
            ],
            'type_payment' => [
                'required' => 'Ошибка в клиента! Отсутствует тип отплаты',
                'max' => 'Ошибка в клиента! Максимальное значение типа оплаты: 255',
                'min' => 'Ошибка в клиента! Минимальное значение типа оплаты: 3',
            ],
            'contact' => [
                'required' => 'Отсутствует тип отплаты',
                'max' => 'Максимальное значение поля контакты: 255',
                'min' => 'Минимальное значение поля контакты: 3',
                'string' => 'Текст поля контакты должен быть строкой',
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
