<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\AuditFindingStatus;
use IncadevUns\CoreDomain\Enums\SeverityLevel;

class UpdateAuditFindingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'audit_id' => ['sometimes', 'required', 'integer', 'exists:audits,id'],
            'description' => ['sometimes', 'required', 'string'],
            'severity' => [
                'sometimes',
                'required',
                'string',
                Rule::enum(SeverityLevel::class),
            ],
            'status' => [
                'sometimes',
                'required',
                'string',
                Rule::enum(AuditFindingStatus::class),
            ],
        ];
    }
}
