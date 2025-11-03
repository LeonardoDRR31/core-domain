<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\PaymentVerificationStatus;

class StoreEnrollmentPaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'enrollment_id' => ['required', 'integer', 'exists:enrollments,id'],
            'operation_number' => ['required', 'string', 'max:255'],
            'agency_number' => ['required', 'string', 'max:255'],
            'operation_date' => ['required', 'date'],
            'amount' => ['required', 'numeric', 'min:0'],
            'evidence_path' => ['required', 'string', 'max:255'],
            'status' => [
                'required',
                'string',
                Rule::enum(PaymentVerificationStatus::class),
            ],
        ];
    }
}
