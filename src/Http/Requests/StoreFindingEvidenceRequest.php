<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\MediaType;

class StoreFindingEvidenceRequest extends FormRequest
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
            'type' => ['nullable', 'string', Rule::enum(MediaType::class)],
            'path' => ['required', 'string', 'max:255'],
        ];
    }
}
