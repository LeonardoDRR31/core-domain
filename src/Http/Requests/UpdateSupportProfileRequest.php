<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSupportProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $modelId = $this->route('support_profile')?->id;

        return [
            'user_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:users,id',
                Rule::unique('support_profiles')->ignore($modelId),
            ],
            'skills' => ['sometimes', 'nullable', 'array'],
            'experience_years' => [
                'sometimes',
                'nullable',
                'integer',
                'min:0',
                'max:65535',
            ],
        ];
    }
}
