<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\StrategicContentType;

class UpdateStrategicContentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => [
                'sometimes',
                'required',
                'string',
                Rule::enum(StrategicContentType::class),
            ],
            'content' => ['sometimes', 'required', 'string'],
        ];
    }
}
