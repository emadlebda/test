<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'company_id' => ['required', 'exists:companies,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
