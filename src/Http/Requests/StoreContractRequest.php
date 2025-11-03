<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\StaffPaymentType;
use IncadevUns\CoreDomain\Enums\StaffType;

class StoreContractRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'staff_type' => [
                'nullable',
                'string',
                Rule::enum(StaffType::class),
            ],
            'payment_type' => [
                'nullable',
                'string',
                Rule::enum(StaffPaymentType::class),
            ],
            'amount' => ['required', 'numeric', 'min:0'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
        ];
    }
}
