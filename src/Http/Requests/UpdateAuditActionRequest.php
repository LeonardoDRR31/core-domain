<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\AuditActionStatus;

class UpdateAuditActionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'audit_finding_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:audit_findings,id',
            ],
            'responsible_id' => ['sometimes', 'nullable', 'integer', 'exists:users,id'],
            'action_required' => ['sometimes', 'required', 'string'],
            'due_date' => ['sometimes', 'nullable', 'date', 'after_or_equal:today'],
            'status' => [
                'sometimes',
                'required',
                'string',
                Rule::enum(AuditActionStatus::class),
            ],
        ];
    }
}
