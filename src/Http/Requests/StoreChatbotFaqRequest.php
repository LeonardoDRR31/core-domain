<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChatbotFaqRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question' => ['required', 'string'],
            'answer' => ['required', 'string'],
            'category' => ['nullable', 'string', 'max:225'],
            'keywords' => ['nullable', 'array'],
            'active' => ['nullable', 'boolean'],
            'usage_count' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
