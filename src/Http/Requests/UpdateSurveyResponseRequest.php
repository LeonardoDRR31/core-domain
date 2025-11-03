<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSurveyResponseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'survey_id' => ['sometimes', 'required', 'integer', 'exists:surveys,id'],
            'user_id' => ['sometimes', 'required', 'integer', 'exists:users,id'],
            'rateable_id' => ['sometimes', 'required', 'integer', 'min:1'],
            'rateable_type' => ['sometimes', 'required', 'string', 'max:255'],
            'date' => ['sometimes', 'nullable', 'date'],
        ];
    }
}
