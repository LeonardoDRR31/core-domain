<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\AppointmentStatus;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'teacher_id' => [
                'required',
                'integer',
                'exists:users,id',
                'different:student_id',
            ],
            'student_id' => [
                'required',
                'integer',
                'exists:users,id',
            ],
            'start_time' => ['required', 'date', 'after_or_equal:now'],
            'end_time' => ['required', 'date', 'after:start_time'],
            'status' => [
                'nullable',
                'string',
                Rule::enum(AppointmentStatus::class),
            ],
            'meet_url' => ['nullable', 'string', 'url:http,https', 'max:255'],
        ];
    }
}
