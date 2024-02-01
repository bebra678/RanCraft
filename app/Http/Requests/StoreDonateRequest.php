<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'max:11', 'min:1'],
            'nick' => ['required', 'regex:/^[a-zA-Z0-9_]+$/i', 'max:30', 'min:3'],
            'donate' => ['required', 'string', 'max:255', 'min:3'],
            'type_payment' => ['required', 'string', 'max:255', 'min:3'],
        ];
    }
}
