<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\OrganizationType;

class UpdateOrganizationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $modelId = $this->route('organization')?->id;

        return [
            'ruc' => [
                'sometimes',
                'nullable',
                'string',
                'digits:11',
                Rule::unique('organizations')->ignore($modelId),
            ],
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'type' => [
                'sometimes',
                'nullable',
                'string',
                Rule::enum(OrganizationType::class),
            ],
            'contact_phone' => ['sometimes', 'nullable', 'string', 'max:255'],
            'contact_email' => ['sometimes', 'nullable', 'email', 'max:255'],
        ];
    }
}
