<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSurveyQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'survey_id' => ['sometimes', 'required', 'integer', 'exists:surveys,id'],
            'question' => ['sometimes', 'required', 'string'],
            'order' => ['sometimes', 'required', 'integer', 'min:0', 'max:65535'],
        ];
    }
}
