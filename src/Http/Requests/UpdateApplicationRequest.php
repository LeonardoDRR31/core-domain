<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\ApplicationStatus;

class UpdateApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cv_path' => ['sometimes', 'required', 'string', 'max:255'],
            'status' => [
                'sometimes',
                'required',
                'string',
                Rule::enum(ApplicationStatus::class),
            ],
        ];
    }
}
