<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\TechAssetStatus;
use IncadevUns\CoreDomain\Enums\TechAssetType;

class UpdateTechAssetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $acquisitionDate = $this->input(
            'acquisition_date',
            $this->route('tech_asset')?->acquisition_date
        );

        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'type' => [
                'sometimes',
                'nullable',
                'string',
                Rule::enum(TechAssetType::class),
            ],
            'status' => [
                'sometimes',
                'required',
                'string',
                Rule::enum(TechAssetStatus::class),
            ],
            'user_id' => ['sometimes', 'nullable', 'integer', 'exists:users,id'],
            'acquisition_date' => ['sometimes', 'nullable', 'date'],
            'expiration_date' => [
                'sometimes',
                'nullable',
                'date',
                'after_or_equal:'.$acquisitionDate,
            ],
        ];
    }
}
