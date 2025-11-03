<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResponseDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'survey_response_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:survey_responses,id',
            ],
            'survey_question_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:survey_questions,id',
            ],
            'score' => ['sometimes', 'nullable', 'integer', 'between:0,255'],
        ];
    }
}
