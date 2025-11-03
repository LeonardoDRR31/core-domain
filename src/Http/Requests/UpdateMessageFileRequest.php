<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\MediaType;

class UpdateMessageFileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'message_id' => ['sometimes', 'required', 'integer', 'exists:messages,id'],
            'type' => ['sometimes', 'nullable', 'string', Rule::enum(MediaType::class)],
            'path' => ['sometimes', 'required', 'string', 'max:255'],
        ];
    }
}
