<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAcademicSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $baseGrade = $this->input(
            'base_grade',
            $this->route('academic_setting')?->base_grade
        );

        return [
            'base_grade' => [
                'sometimes',
                'required',
                'integer',
                'min:0',
                'max:65535',
            ],
            'min_passing_grade' => [
                'sometimes',
                'required',
                'integer',
                'min:0',
                'max:65535',
                'lte:'.$baseGrade,
            ],
            'absence_percentage' => [
                'sometimes',
                'required',
                'numeric',
                'between:0,100.00',
            ],
        ];
    }
}
