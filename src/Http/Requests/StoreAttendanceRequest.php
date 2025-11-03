<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\AttendanceStatus;

class StoreAttendanceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'class_session_id' => [
                'required',
                'integer',
                'exists:class_sessions,id',
            ],
            'enrollment_id' => [
                'required',
                'integer',
                'exists:enrollments,id',
                Rule::unique('attendances')
                    ->where('class_session_id', $this->input('class_session_id')),
            ],
            'status' => [
                'required',
                'string',
                Rule::enum(AttendanceStatus::class),
            ],
        ];
    }
}
