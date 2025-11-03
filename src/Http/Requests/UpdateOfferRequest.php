<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['sometimes', 'nullable', 'string'],
            'requirements' => ['sometimes', 'nullable', 'array'],
            'closing_date' => ['sometimes', 'nullable', 'date', 'after_or_equal:today'],
        ];
    }
}
