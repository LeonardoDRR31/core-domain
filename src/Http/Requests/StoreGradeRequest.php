<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGradeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'exam_id' => [
                'required',
                'integer',
                'exists:exams,id',
            ],
            'enrollment_id' => [
                'required',
                'integer',
                'exists:enrollments,id',
                Rule::unique('grades')
                    ->where('exam_id', $this->input('exam_id')),
            ],
            'grade' => ['required', 'numeric', 'between:0,999.99'],
            'feedback' => ['nullable', 'string'],
        ];
    }
}
