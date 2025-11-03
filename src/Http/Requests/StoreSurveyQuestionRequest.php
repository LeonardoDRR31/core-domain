<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSurveyQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'survey_id' => ['required', 'integer', 'exists:surveys,id'],
            'question' => ['required', 'string'],
            'order' => ['required', 'integer', 'min:0', 'max:65535'],
        ];
    }
}
