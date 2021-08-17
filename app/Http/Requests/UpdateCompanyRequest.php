<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string'],
            'email' => ['email'],
            'phone' => ['numeric'],
            'website' => ['url'],
            'logo' => ['image'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
