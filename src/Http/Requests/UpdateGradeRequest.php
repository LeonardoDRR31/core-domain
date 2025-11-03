<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGradeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $model = $this->route('grade');
        $modelId = $model?->id;
        $examId = $this->input('exam_id', $model?->exam_id);

        return [
            'exam_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:exams,id',
            ],
            'enrollment_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:enrollments,id',
                Rule::unique('grades')
                    ->where('exam_id', $examId)
                    ->ignore($modelId),
            ],
            'grade' => ['sometimes', 'required', 'numeric', 'between:0,999.99'],
            'feedback' => ['sometimes', 'nullable', 'string'],
        ];
    }
}
