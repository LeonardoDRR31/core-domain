<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\StaffPaymentType;
use IncadevUns\CoreDomain\Enums\StaffType;

class UpdateContractRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $startDate = $this->input(
            'start_date',
            $this->route('contract')?->start_date
        );

        return [
            'user_id' => ['sometimes', 'required', 'integer', 'exists:users,id'],
            'staff_type' => [
                'sometimes',
                'nullable',
                'string',
                Rule::enum(StaffType::class),
            ],
            'payment_type' => [
                'sometimes',
                'nullable',
                'string',
                Rule::enum(StaffPaymentType::class),
            ],
            'amount' => ['sometimes', 'required', 'numeric', 'min:0'],
            'start_date' => ['sometimes', 'required', 'date'],
            'end_date' => [
                'sometimes',
                'nullable',
                'date',
                'after_or_equal:'.$startDate,
            ],
        ];
    }
}
