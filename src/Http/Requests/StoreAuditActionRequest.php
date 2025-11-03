<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\AuditActionStatus;

class StoreAuditActionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'audit_finding_id' => [
                'required',
                'integer',
                'exists:audit_findings,id',
            ],
            'responsible_id' => ['nullable', 'integer', 'exists:users,id'],
            'action_required' => ['required', 'string'],
            'due_date' => ['nullable', 'date', 'after_or_equal:today'],
            'status' => [
                'required',
                'string',
                Rule::enum(AuditActionStatus::class),
            ],
        ];
    }
}
