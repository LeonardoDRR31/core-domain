<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => [
                'required',
                'integer',
                'exists:users,id',
                'unique:teacher_profiles',
            ],
            'subject_areas' => ['nullable', 'array'],
            'professional_summary' => ['nullable', 'string'],
            'cv_path' => ['nullable', 'string', 'max:255'],
        ];
    }
}
