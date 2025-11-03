<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\PaymentVerificationStatus;

class UpdateEnrollmentPaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'enrollment_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:enrollments,id',
            ],
            'operation_number' => ['sometimes', 'required', 'string', 'max:255'],
            'agency_number' => ['sometimes', 'required', 'string', 'max:255'],
            'operation_date' => ['sometimes', 'required', 'date'],
            'amount' => ['sometimes', 'required', 'numeric', 'min:0'],
            'evidence_path' => ['sometimes', 'required', 'string', 'max:255'],
            'status' => [
                'sometimes',
                'required',
                'string',
                Rule::enum(PaymentVerificationStatus::class),
            ],
        ];
    }
}
