<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\EnrollmentAcademicStatus;
use IncadevUns\CoreDomain\Enums\PaymentStatus;

class StoreEnrollmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'group_id' => [
                'required',
                'integer',
                'exists:groups,id',
            ],
            'user_id' => [
                'required',
                'integer',
                'exists:users,id',
                Rule::unique('enrollments')
                    ->where('group_id', $this->input('group_id')),
            ],
            'payment_status' => [
                'required',
                'string',
                Rule::enum(PaymentStatus::class),
            ],
            'academic_status' => [
                'required',
                'string',
                Rule::enum(EnrollmentAcademicStatus::class),
            ],
        ];
    }
}
