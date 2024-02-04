<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
}
