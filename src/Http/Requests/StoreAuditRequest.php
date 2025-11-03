<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\AuditStatus;

class StoreAuditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'auditor_id' => ['nullable', 'integer', 'exists:users,id'],
            'audit_date' => ['required', 'date'],
            'summary' => ['nullable', 'string'],
            'status' => [
                'required',
                'string',
                Rule::enum(AuditStatus::class),
            ],
            'auditable_id' => ['required', 'integer', 'min:1'],
            'auditable_type' => ['required', 'string', 'max:255'],
        ];
    }
}
