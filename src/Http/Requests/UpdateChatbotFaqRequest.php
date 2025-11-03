<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChatbotFaqRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question' => ['sometimes', 'required', 'string'],
            'answer' => ['sometimes', 'required', 'string'],
            'category' => ['sometimes', 'nullable', 'string', 'max:225'],
            'keywords' => ['sometimes', 'nullable', 'array'],
            'active' => ['sometimes', 'nullable', 'boolean'],
            'usage_count' => ['sometimes', 'nullable', 'integer', 'min:0'],
        ];
    }
}
