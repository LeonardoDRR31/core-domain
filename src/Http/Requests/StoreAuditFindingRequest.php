<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\AuditFindingStatus;
use IncadevUns\CoreDomain\Enums\SeverityLevel;

class StoreAuditFindingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'audit_id' => ['required', 'integer', 'exists:audits,id'],
            'description' => ['required', 'string'],
            'severity' => [
                'required',
                'string',
                Rule::enum(SeverityLevel::class),
            ],
            'status' => [
                'required',
                'string',
                Rule::enum(AuditFindingStatus::class),
            ],
        ];
    }
}
