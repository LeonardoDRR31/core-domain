<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\MediaType;

class UpdateClassSessionMaterialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'class_session_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:class_sessions,id',
            ],
            'type' => [
                'sometimes',
                'nullable',
                'string',
                Rule::enum(MediaType::class),
            ],
            'material_url' => [
                'sometimes',
                'required',
                'string',
                'url:http,https',
                'max:255',
            ],
        ];
    }
}
