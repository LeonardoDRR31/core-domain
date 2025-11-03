<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResponseDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'survey_response_id' => [
                'required',
                'integer',
                'exists:survey_responses,id',
            ],
            'survey_question_id' => [
                'required',
                'integer',
                'exists:survey_questions,id',
            ],
            'score' => ['nullable', 'integer', 'between:0,255'],
        ];
    }
}
