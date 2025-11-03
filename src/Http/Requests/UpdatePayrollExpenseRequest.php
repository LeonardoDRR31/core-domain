<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePayrollExpenseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'contract_id' => ['sometimes', 'required', 'integer', 'exists:contracts,id'],
            'amount' => ['sometimes', 'required', 'numeric', 'min:0'],
            'date' => ['sometimes', 'required', 'date'],
            'description' => ['sometimes', 'nullable', 'string', 'max:255'],
        ];
    }
}
