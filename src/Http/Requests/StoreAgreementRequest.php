<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\AgreementStatus;

class StoreAgreementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'organization_id' => [
                'required',
                'integer',
                'exists:organizations,id',
            ],
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'renewal_date' => [
                'nullable',
                'date',
                'after_or_equal:start_date',
            ],
            'purpose' => ['nullable', 'string'],
            'status' => [
                'required',
                'string',
                Rule::enum(AgreementStatus::class),
            ],
        ];
    }
}
