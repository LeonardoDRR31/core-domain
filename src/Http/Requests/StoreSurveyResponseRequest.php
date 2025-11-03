<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSurveyResponseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'survey_id' => ['required', 'integer', 'exists:surveys,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'rateable_id' => ['required', 'integer', 'min:1'],
            'rateable_type' => ['required', 'string', 'max:255'],
            'date' => ['nullable', 'date'],
        ];
    }
}
