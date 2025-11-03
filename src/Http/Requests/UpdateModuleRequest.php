<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateModuleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'course_version_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:course_versions,id',
            ],
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['sometimes', 'nullable', 'string'],
            'sort' => ['sometimes', 'required', 'integer', 'min:0', 'max:65535'],
        ];
    }
}
