<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\AgreementStatus;

class UpdateAgreementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $startDate = $this->input(
            'start_date',
            $this->route('agreement')?->start_date
        );

        return [
            'organization_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:organizations,id',
            ],
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'start_date' => ['sometimes', 'required', 'date'],
            'renewal_date' => [
                'sometimes',
                'nullable',
                'date',
                'after_or_equal:'.$startDate,
            ],
            'purpose' => ['sometimes', 'nullable', 'string'],
            'status' => [
                'sometimes',
                'required',
                'string',
                Rule::enum(AgreementStatus::class),
            ],
        ];
    }
}
