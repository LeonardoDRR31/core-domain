<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupportProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => [
                'required',
                'integer',
                'exists:users,id',
                'unique:support_profiles',
            ],
            'skills' => ['nullable', 'array'],
            'experience_years' => ['nullable', 'integer', 'min:0', 'max:65535'],
        ];
    }
}
