<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\MediaType;

class StoreMessageFileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'message_id' => ['required', 'integer', 'exists:messages,id'],
            'type' => ['nullable', 'string', Rule::enum(MediaType::class)],
            'path' => ['required', 'string', 'max:255'],
        ];
    }
}
