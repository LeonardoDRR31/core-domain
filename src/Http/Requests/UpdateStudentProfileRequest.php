<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $modelId = $this->route('student_profile')?->id;

        return [
            'user_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:users,id',
                Rule::unique('student_profiles')->ignore($modelId),
            ],
            'interests' => ['sometimes', 'nullable', 'array'],
            'learning_goal' => ['sometimes', 'nullable', 'string'],
        ];
    }
}
