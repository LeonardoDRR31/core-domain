<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\TechAssetStatus;
use IncadevUns\CoreDomain\Enums\TechAssetType;

class StoreTechAssetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['nullable', 'string', Rule::enum(TechAssetType::class)],
            'status' => [
                'required',
                'string',
                Rule::enum(TechAssetStatus::class),
            ],
            'user_id' => ['nullable', 'integer', 'exists:users,id'],
            'acquisition_date' => ['nullable', 'date'],
            'expiration_date' => [
                'nullable',
                'date',
                'after_or_equal:acquisition_date',
            ],
        ];
    }
}
