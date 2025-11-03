<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAcademicSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'base_grade' => [
                'required',
                'integer',
                'min:0',
                'max:65535',
            ],
            'min_passing_grade' => [
                'required',
                'integer',
                'min:0',
                'max:65535',
                'lte:base_grade',
            ],
            'absence_percentage' => [
                'required',
                'numeric',
                'between:0,100.00',
            ],
        ];
    }
}
