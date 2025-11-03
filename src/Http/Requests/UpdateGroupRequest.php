<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\GroupStatus;

class UpdateGroupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $startDate = $this->input(
            'start_date',
            $this->route('group')?->start_date
        );

        return [
            'course_version_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:course_versions,id',
            ],
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'start_date' => ['sometimes', 'required', 'date'],
            'end_date' => [
                'sometimes',
                'required',
                'date',
                'after_or_equal:'.$startDate,
            ],
            'status' => [
                'sometimes',
                'required',
                'string',
                Rule::enum(GroupStatus::class),
            ],
        ];
    }
}
