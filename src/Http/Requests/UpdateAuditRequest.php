<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\AuditStatus;

class UpdateAuditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'auditor_id' => ['sometimes', 'nullable', 'integer', 'exists:users,id'],
            'audit_date' => ['sometimes', 'required', 'date'],
            'summary' => ['sometimes', 'nullable', 'string'],
            'status' => [
                'sometimes',
                'required',
                'string',
                Rule::enum(AuditStatus::class),
            ],
            'auditable_id' => ['sometimes', 'required', 'integer', 'min:1'],
            'auditable_type' => ['sometimes', 'required', 'string', 'max:255'],
        ];
    }
}
