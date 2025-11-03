<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeacherProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $modelId = $this->route('teacher_profile')?->id;

        return [
            'user_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:users,id',
                Rule::unique('teacher_profiles')->ignore($modelId),
            ],
            'subject_areas' => ['sometimes', 'nullable', 'array'],
            'professional_summary' => ['sometimes', 'nullable', 'string'],
            'cv_path' => ['sometimes', 'nullable', 'string', 'max:255'],
        ];
    }
}
