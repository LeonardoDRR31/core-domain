<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\SurveyEvent;

class UpdateSurveyMappingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'event' => [
                'sometimes',
                'required',
                'string',
                Rule::enum(SurveyEvent::class),
            ],
            'survey_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:surveys,id',
            ],
            'description' => ['sometimes', 'nullable', 'string', 'max:255'],
        ];
    }
}
