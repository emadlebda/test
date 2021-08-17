<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'website' => ['required', 'url'],
            'logo' => ['required', 'image'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
