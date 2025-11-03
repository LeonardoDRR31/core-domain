<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\AppointmentStatus;

class UpdateAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $startTime = $this->input(
            'start_time',
            $this->route('appointment')?->start_time
        );
        $studentId = $this->input(
            'student_id',
            $this->route('appointment')?->student_id
        );
        $teacherId = $this->input(
            'teacher_id',
            $this->route('appointment')?->teacher_id
        );

        return [
            'teacher_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:users,id',
                'different:'.$studentId,
            ],
            'student_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:users,id',
                'different:'.$teacherId,
            ],
            'start_time' => ['sometimes', 'required', 'date'],
            'end_time' => [
                'sometimes',
                'required',
                'date',
                'after:'.$startTime,
            ],
            'status' => [
                'sometimes',
                'required',
                'string',
                Rule::enum(AppointmentStatus::class),
            ],
            'meet_url' => ['sometimes', 'nullable', 'string', 'url:http,https', 'max:255'],
        ];
    }
}
